<?php

namespace App\Controller\Admin;

use App\Entity\PublishT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

// use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class PublishTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PublishT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('report'),
            AssociationField::new('frequency'),
            DateField::new('first_release_of_month'),
            DateField::new('start_date'),
            DateField::new('end_date'),
        ];
    }
}
