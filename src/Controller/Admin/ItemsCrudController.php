<?php

namespace App\Controller\Admin;

use App\Entity\Items;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ItemsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Items::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description'),
            ImageField::new('image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            AssociationField::new('category')
        ];
    }
}
