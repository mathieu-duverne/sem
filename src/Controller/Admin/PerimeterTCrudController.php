<?php

namespace App\Controller\Admin;

use App\Entity\PerimeterT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PerimeterTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PerimeterT::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
