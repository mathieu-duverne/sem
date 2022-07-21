<?php

namespace App\Controller\Admin;

use App\Entity\WarningT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class WarningTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WarningT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('code'),
            TextField::new('name'),
            AssociationField::new('frequency'),
            AssociationField::new('publish'),
            AssociationField::new('report'),
            AssociationField::new('kpi'),
        ];
    }
    
}
