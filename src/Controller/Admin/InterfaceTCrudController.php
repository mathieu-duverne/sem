<?php

namespace App\Controller\Admin;

use App\Entity\InterfaceT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class InterfaceTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InterfaceT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('descr'),
            AssociationField::new('data_source'),
            AssociationField::new('data_target'),
            AssociationField::new('etl'),
            ArrayField::new('perimeter_ids'),

        ];
    }
    
}
