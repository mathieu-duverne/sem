<?php

namespace App\Controller\Admin;

use App\Entity\KpiVersionT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class KpiVersionTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return KpiVersionT::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            NumberField::new('version'),
            TextField::new('calc_descr'),
            DateField::new('start_date'),
            DateField::new('end_date'),
            NumberField::new('criticity'),
            NumberField::new('accuracy'),
            NumberField::new('penalty'),
            NumberField::new('penalty'),
            TextField::new('ext_ref'),
            TextField::new('doc_url'),
            AssociationField::new('kpi'),
            AssociationField::new('unit'),
            AssociationField::new('frequency'),
            AssociationField::new('organism'),
        ];
    }
    
}
