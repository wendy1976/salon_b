<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\ChiffreAffaireDepartement;

class ChiffreAffaireDepartementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChiffreAffaireDepartement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Les chiffres d\'affaires par département 2023')
            ->setEntityLabelInSingular('Le chiffre d\'affaire par département')
            //->setDateFormat('d/m/Y', 'fr_FR')
            //->setTimeFormat('...')
            ->setPageTitle('index','Salon Beautiful - Les chiffres d\'affaires par départements 2023')
            
            // ...
        ;
    }
}

