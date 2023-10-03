<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\ChiffreAffaireRegion;

class ChiffreAffaireRegionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChiffreAffaireRegion::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Les chiffres d\'affaires par région 2023')
            ->setEntityLabelInSingular('Le chiffre d\'affaire par région')
            //->setDateFormat('d/m/Y', 'fr_FR')
            //->setTimeFormat('...')
            ->setPageTitle('index','Salon Beautiful - Les chiffres d\'affaires par régions 2023')
            
            // ...
        ;
    }
}

