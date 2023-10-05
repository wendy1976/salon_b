<?php
# Controlleur crud pour afficher les chiffres d'affaires mensuels du salon
namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\ChiffreAffaire;
use App\Repository\ChiffreAffaireRepository;

class ChiffreAffaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChiffreAffaire::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Les chiffres d\'affaires 2023')
            ->setEntityLabelInSingular('Le chiffre d\'affaire')
            //->setDateFormat('d/m/Y', 'fr_FR')
            //->setTimeFormat('...')
            ->setPageTitle('index','Salon Beautiful - Les chiffres d\'affaires 2023')
            
            // ...
        ;
    }

    
}

