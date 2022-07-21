<?php

namespace App\Controller\Admin;

use App\Entity\DataLocationT; 
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class DataLocationTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DataLocationT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('descr'),
            AssociationField::new('type'),
            ArrayField::new('perimeter_ids'),
            // AssociationField::new('dataSourceTs'),
            // AssociationField::new('dataTargetTs'),
            // AssociationField::new('DataLocationContactTs'),
        ];
    }

}
