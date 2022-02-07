<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ConcertHall;

/**
 * Class Fixture
 * @package App\DataFixtures
 */
class ConcertHallFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {

        $concertHall = array(
            array('id' => "galaxie",
                'name' => 'La Galaxie',
                'adress' => '66 quai Bélu',
                'info' => '100 places assises, 200 debout'
            ),
            array('id' => "lunepirates",
                'name'=> 'La Lune des Pirates',
                'adress' => '45 quai Bélu',
                'info' => '300 places assises, 600 debout'
            )
        );
    
        foreach ($concertHall as $cH){
            $newConcertHall = new ConcertHall();
            $newConcertHall->setName($cH['name'])
                ->setInfo($cH['info'])
                ->setPicture($cH['name'] . '.jpg')
                ->setAdress($cH['adress']);
            $manager->persist($newConcertHall);

            $this->addReference($cH['id'], $newConcertHall);
        }

        $manager->flush();
    }
}