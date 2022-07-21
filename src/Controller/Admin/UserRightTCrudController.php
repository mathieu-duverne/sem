<?php

namespace App\Controller\Admin;

use App\Entity\UserRightT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class UserRightTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserRightT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('people'),
            AssociationField::new('perimeter'),
            DateField::new('start_date'),
            DateField::new('end_date'),
        ];
    }
    
}
