<?php

namespace App\Controller;

use App\Classe\Search;
use App\Form\SearchType;
use App\Repository\ItemsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalerieController extends AbstractController
{
    /**
     * @Route("/galerie", name="galerie")
     */
    public function index(Request $request, ItemsRepository $itemsRep): Response
    {
        $item = $itemsRep->findAll();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //$search = $form->getData(); REDONDANT DANS CE CAS
            $item = $itemsRep->findWithSearch($search);
        } else {
            $item = $itemsRep->findAll();
        }

        return $this->render('galerie/index.html.twig', [
            'item' => $item,
            'form' => $form->createView()
        ]);
    }
}
