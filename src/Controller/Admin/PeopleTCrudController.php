<?php

namespace App\Controller\Admin;

use App\Entity\PeopleT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PeopleTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PeopleT::class;
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
