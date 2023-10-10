<?php

namespace App\DataFixtures;

// src/DataFixtures/ChiffreAffaireDepartementFixtures.php

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ChiffreAffaireDepartement;
use Faker\Factory;


class ChiffreAffaireDepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
{
    $faker = Factory::create();

    // Tableau des noms de mois en français
    $moisEnFrancais = [
        'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
        'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
    ];

    // Créez des instances de ChiffreAffaireDepartement avec des données fictives pour 96 départements et 12 mois
    for ($departementIndex = 1; $departementIndex <= 96; $departementIndex++) {
        for ($mois = 1; $mois <= 12; $mois++) {
            $chiffreAffaireDepartement = new ChiffreAffaireDepartement();
            $chiffreAffaireDepartement->setDepartements('Département ' . $departementIndex);

            // Utilisez le tableau des noms de mois en français
            $nomMois = $moisEnFrancais[$mois - 1];

            $chiffreAffaireDepartement->setMois($nomMois);
            $chiffreAffaireDepartement->setCa($faker->numberBetween(500000, 1000000));

            // Persistez chaque instance
            $manager->persist($chiffreAffaireDepartement);
        }
    }

    // Appliquez les modifications à la base de données
    $manager->flush();
}
}