<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Band;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * 
 */
class BandFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $band = array(
            array('id' => 'queen',
                'name' => 'Queen',
                'style' => 'Glam Rock',
                'info' => 'Queen est un groupe de rock britannique, originaire de Londres, en Angleterre. Il est formé en 1970 par Freddie Mercury, Brian May et Roger Taylor, ces deux derniers étant issus du groupe Smile. L’année suivante, le bassiste John Deacon vient compléter la formation. Les quatre membres de Queen sont tous des auteurs-compositeurs.',
                'artists' => array('FM','BM','RT','JD'),
                'picture' => 'Queen.jpg'
            ),
            array('id' => 'ratm',
                'name' => 'Rage against the Machine',
                'style' => 'Rap Rock',
                'info' => 'Rage Against the Machine (souvent abrégé Rage ou RATM) est un groupe de rock américain, originaire de Los Angeles, en Californie. Leur style musical est une fusion de metal et de rap, avec des influences funk et punk. Composé de Zack de la Rocha, Tom Morello, Tim Commerford et Brad Wilk, le groupe marque les années 1990 jusqu\'à sa dissolution en 20009. Il s\'est reformé en janvier 2007 pour le festival de Coachella et une nouvelle fois pour notre salle de concert.',
                'artists' => array('ZR','TM','TC','BW'),
                'picture' => 'Rage_against_the_Machine.jpg'
            )
        );
    
        foreach ($band as $b){
            $newBand = new Band();
            $newBand->setName($b['name'])
                ->setStyle($b['style'])
                ->setInfo($b['info'])
                ->setPicture($b['picture']);
            
            foreach ($b['artists'] as $a){
                $newBand->addArtist($this->getReference($a));
            }
            $manager->persist($newBand);

            $this->addReference($b['id'], $newBand);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ArtistFixture::class,
        ];
    }
}
