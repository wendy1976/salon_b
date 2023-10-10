<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ChiffreAffaireRegion;
use Faker\Factory;

class ChiffreAffaireRegionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Tableau des noms de mois en français
        $moisEnFrancais = [
            'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
            'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
        ];

        // Créez des instances de ChiffreAffaireRegion avec des données fictives pour 13_ régions et 12 mois
        $regions = [
            'Auvergne-Rhône-Alpes', 'Bourgogne-Franche-Comté', 'Bretagne', 'Centre-Val de Loire', 'Corse',
            'Grand-Est', 'Guadeloupe', 'Guyane', 'Hauts-de-France', ' Île-de-France',
            'La Réunion', 'Martinique', 'Mayotte','Normandie','Nouvelle-Aquitaine','Occitanie',
            'Pays de la Loire','Provence-Alpes-Côte d\'Azur'
        ];

        foreach ($regions as $region) {
            for ($mois = 1; $mois <= 12; $mois++) {
                $chiffreAffaireRegion = new ChiffreAffaireRegion();
                $chiffreAffaireRegion->setRegions($region);

                // Utilisez le tableau des noms de mois en français
                $nomMois = $moisEnFrancais[$mois - 1];

                $chiffreAffaireRegion->setMois($nomMois);
                $chiffreAffaireRegion->setCa($faker->numberBetween(5000000, 10000000));

                // Persistez chaque instance
                $manager->persist($chiffreAffaireRegion);
            }
        }

        // Appliquez les modifications à la base de données
        $manager->flush();
    }
}
