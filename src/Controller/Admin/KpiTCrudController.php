<?php

namespace App\Controller\Admin;

use App\Entity\KpiT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class KpiTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return KpiT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('ref'),
            TextField::new('name'),
            TextField::new('descr'),
            TextField::new('goal'),
            AssociationField::new('domain'),
            AssociationField::new('category'),
            AssociationField::new('role'),
            DateField::new('start_date'),
        ];
    }
    
}
