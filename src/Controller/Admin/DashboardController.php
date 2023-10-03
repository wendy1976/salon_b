<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\ChiffreAffaire;
use App\Entity\ChiffreAffaireRegion;
use App\Entity\ChiffreAffaireDepartement;
use App\Entity\Salon;


use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//Création de l'interface du tableau de bord
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Salon B - Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToRoute('Le salon Beautiful!', 'fa-solid fa-building', 'salon');
        yield MenuItem::linkToCrud('Liste des utilisateurs', 'fa-solid fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Chiffres d\'affaires du salon', 'fa-solid fa-euro-sign', ChiffreAffaire::class);
        yield MenuItem::linkToCrud('Chiffres d\'affaires par région', 'fa-solid fa-euro-sign', ChiffreAffaireRegion::class);
        yield MenuItem::linkToCrud('Chiffres d\'affaires par département', 'fa-solid fa-euro-sign', ChiffreAffaireDepartement::class);
        
        yield MenuItem::linkToUrl('Moyenne et Somme du CA du Salon Beautiful', 'fa fa-chart-bar', $this->generateUrl('chiffre_affaire_index'));
        yield MenuItem::linkToUrl('Moyenne et Somme du CA par région', 'fa fa-chart-bar', $this->generateUrl('chiffre_affaire_region_index'));
        yield MenuItem::linkToUrl('Moyenne et Somme du CA par département', 'fa fa-chart-bar', $this->generateUrl('chiffre_affaire_departement_index'));
    }
}
