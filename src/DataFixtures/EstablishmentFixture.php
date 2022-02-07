<?php

namespace App\DataFixtures;

use App\Entity\Establishment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EstablishmentFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $establishment = array(
            'name' => 'Elderberry',
            'adress' => '10 rue des Vanescences',
            'telephone' => '0000000-0',
            'town' => 'Sealand Micronation',
            'zipcode' => 00000,
            'logo' => '/pictures/logos/sealand.svg'
        );

        $newEstablishment = new Establishment();
        $newEstablishment->setName($establishment['name'])
            ->setAdress($establishment['adress'])
            ->setTelephone($establishment['telephone'])
            ->setTown($establishment['town'])
            ->setZipcode($establishment['zipcode'])
            ->setLogo($establishment['logo']);
    
        $manager->persist($newEstablishment);

        $this->addReference($establishment['id'], $newEstablishment);

        $manager->flush();
    }
}
