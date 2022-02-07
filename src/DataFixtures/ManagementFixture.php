<?php

namespace App\DataFixtures;

use App\Entity\Management;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class DataFixture
 * @Package App|DataFixtures
 */
class ManagementFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $management = array(
            'id' => 'ldp_management',
            'name' => 'La lune des pirates',
            'adress' => '3 rue des Pierres',
            'telephone' => '0344823881',
            'town' => 'Montpellier',
            'zipcode' => 34000
        );

        $newManagement = new Management();
        $newManagement->setName($management['name'])
            ->setAdress($management['adress'])
            ->setTelephone($management['telephone'])
            ->setTown($management['town'])
            ->setZipcode($management['zipcode']);
    
        $manager->persist($newManagement);

        $this->addReference($management['id'], $newManagement);

        $manager->flush();
    }
}