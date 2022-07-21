<?php

namespace App\Controller\Admin;

use App\Entity\ParameterT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParameterTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ParameterT::class;
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
