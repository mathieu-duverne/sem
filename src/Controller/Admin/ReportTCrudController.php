<?php

namespace App\Controller\Admin;

use App\Entity\ReportT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class ReportTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReportT::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('code'),
            TextField::new('name'),
            TextField::new('descr'),
            TextField::new('path'),
            ArrayField::new('data_location_ids'),
            AssociationField::new('type'),
            AssociationField::new('bi_tool'),
        ];
    }
    
}
