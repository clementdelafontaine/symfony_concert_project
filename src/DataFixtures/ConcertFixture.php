<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Concert;

/**
 * Class ConcertFixture
 * @package App\DataFixtures
 */
class ConcertFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $concert = array(
            array('id' => 'queen_concert',
                'name' => 'Queen en live',
                'info' => 'Queen est un groupe de rock britannique, originaire de Londres, en Angleterre. Il est formé en 1970 par Freddie Mercury, Brian May et Roger Taylor, ces deux derniers étant issus du groupe Smile. L’année suivante, le bassiste John Deacon vient compléter la formation. Les quatre membres de Queen sont tous des auteurs-compositeurs.',
                'band' => 'queen',
                'concertHall' => 'lunepirates',
                'management' => 'ldp_management',
                'date' => date_create('2022-02-15')
            ),
            array('id' => 'ratm_concert',
                'name' => 'Rage against the Machine',
                'style' => 'Rap Rock',
                'info' => 'Rage Against the Machine (souvent abrégé Rage ou RATM) est un groupe de rock américain, originaire de Los Angeles, en Californie. Leur style musical est une fusion de metal et de rap, avec des influences funk et punk. Composé de Zack de la Rocha, Tom Morello, Tim Commerford et Brad Wilk, le groupe marque les années 1990 jusqu\'à sa dissolution en 20009. Il s\'est reformé en janvier 2007 pour le festival de Coachella et une nouvelle fois pour notre salle de concert.',
                'band' => 'ratm',
                'concertHall' => 'galaxie',
                'management' => 'ldp_management',
                'date' => date_create('2022-02-18')
            )
        );
    
        foreach ($concert as $c){
            $newConcert = new Concert();
            $newConcert->setName($c['name'])
                ->setInfo($c['info'])
                ->setPoster($c['name'] . '.jpg')
                ->setConcertHall($this->getReference($c['concertHall']))
                ->setMainBand($this->getReference($c['band']))
                ->setDate($c['date'])
                ->setManagement($this->getReference($c['management']));
            
            $manager->persist($newConcert);

            $this->addReference($c['id'], $newConcert);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ArtistFixture::class,
            BandFixture::class,
            ConcertHallFixture::class,
            ManagementFixture::class
        ];
    }
}