<?php

namespace App\Controller\Admin;

use App\Entity\PeopleT;
use App\Entity\ContactT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ContactTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            // IdField::new('id'),
            AssociationField::new('people'),
            AssociationField::new('owner'),
            AssociationField::new('data_kpi'),
            AssociationField::new('report'),
            AssociationField::new('data_location'),
        ];
    }
}
