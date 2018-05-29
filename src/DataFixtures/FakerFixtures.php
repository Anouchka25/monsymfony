<?php
// src/DataFixtures/FakerFixtures.php
namespace App\DataFixtures;

use App\Entity\Facture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 factures
        for ($i = 0; $i < 10; $i++) {
            $facture = new Facture();
            $facture->setNum($faker->num);
            $facture->setNumtva($faker->numtva);
            $facture->setDatefacture($faker->datefacture);
            $facture->setFacturede($faker->facturede);
            $facture->setClient($faker->client);
            $facture->setConditions($faker->conditions);
            $facture->setQuantite($faker->quantite);
            $facture->setPrixht($faker->$prixht);
            $facture->setTaxe($faker->taxe);
            $manager->persist($facture);
        }

        $manager->flush();
    }
}
