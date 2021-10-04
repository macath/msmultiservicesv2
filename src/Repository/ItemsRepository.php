<?php

namespace App\Repository;

use App\Entity\Items;
use App\Classe\Search;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Items|null find($id, $lockMode = null, $lockVersion = null)
 * @method Items|null findOneBy(array $criteria, array $orderBy = null)
 * @method Items[]    findAll()
 * @method Items[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Items::class);
    }

   /**
     * Requête qui me permet de reécupérer les produits en fonction de la recherche de l'utilisateur
     * @return Items[]
     */
    public function findWithSearch(Search $search)
    {
        $query = $this
            ->createQueryBuilder('i')
            ->select('c', 'i')
            ->join('i.category', 'c');

            if(!empty($search->categories)){
                $query = $query 
                    ->andWhere('c.id IN (:categories)')
                    ->setParameter('categories', $search->categories);
            }

            if(!empty($search->string)){
                $query = $query 
                    ->andWhere('i.name LIKE :string')
                    ->setParameter('string', "%{$search->string}%");
            }

            return $query->getQuery()->getResult();
    }
}
