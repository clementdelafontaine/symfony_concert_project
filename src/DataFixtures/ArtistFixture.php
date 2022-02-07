<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;

/**
 * Class ArtistFixture
 * @package App\DataFixtures
 */
class ArtistFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {

        $artist = array(
            array('id' => "FM",
                'name' => 'Freddy Mercury',
                'picture' => 'Freddy_Mercury.jpg',
                'info' => 'Freddie Mercury, nom de scène de Farrokh Bulsara, né le 5 septembre 1946 à Stone Town dans le protectorat de Zanzibar et mort le 24 novembre 1991 à Londres, est un auteur-compositeur-interprète britannique, cofondateur en 1970 et chanteur-pianiste du groupe de rock Queen, au sein duquel il a établi sa réputation internationale, en compagnie du guitariste Brian May, du batteur Roger Taylor et du bassiste John Deacon, tous auteurs-compositeurs comme lui.'
            ),
            array('id' => "BM",
                'name'=> 'Brian May',
                'picture' => 'Brian_May.jpg',
                'info' => 'Brian Harold May est un musicien, chanteur, auteur-compositeur et astrophysicien britannique, né le 19 juillet 1947 à Hampton Hill (Angleterre), au sud-ouest de Londres, cofondateur et guitariste du groupe de rock Queen'
            ),
            array('id' => "RT",
                'name' => 'Roger Taylor',
                'picture' => 'Roger_Taylor.jpg',
                'info' => 'Roger Meddows Taylor, né le 26 juillet 1949 à King\'s Lynn (Norfolk, Angleterre) est un musicien, auteur-compositeur-interprète britannique, surtout connu pour sa prolifique carrière avec le groupe Queen en tant que batteur.'
            ),
            array('id' => "JD",
                'name' => 'John Deacon',
                'picture' => 'John_Deacon.jpg',
                'info' => 'John Richard Deacon, né le 19 août 1951 à Oadby, dans le comté de Leicestershire en Angleterre, est un musicien, et auteur-compositeur britannique.'
            ),
            array('id' => "ZR",
                'name' => 'Zack de la Rocha',
                'picture' => 'Zack_de_la_Rocha.jpg',
                'info' => 'Zacharias Manuel « Zack » de la Rocha, né le 12 janvier 1970 à Long Beach en Californie, est un chanteur, musicien, poète, activiste américain, connu en tant que chanteur du groupe Rage Against the Machine, groupe politiquement engagé et influent, sur le plan des idéaux politiques autant qu\'en musique, réussissant notamment la fusion entre rap et métal.'
            ),
            array('id' => "TM",
                'name' => 'Tom Morello',
                'picture' => 'Tom_Morello.jpg',
                'info' => 'Tom Morello (né Thomas Baptist Morello, le 30 mai 1964) est un guitariste américain connu pour sa participation aux groupes Rage Against the Machine, Audioslave, son projet solo acoustique The Nightwatchman, et son groupe, Street Sweeper Social Club. Morello est aussi le cofondateur (avec Serj Tankian) de l\'organisation politique à but non lucratif Axis of Justice, qui diffuse un programme mensuel sur Pacifica Radio station KPFK (90.7 FM) à Los Angeles. Depuis 2014, il participe également en tant que membre occasionnel au E Street Band de Bruce Springsteen, avec qui il a collaboré sur l\'album High Hopes. Depuis 2016, Tom Morello est un membre du supergroupe Prophets of Rage.'            
            ),
            array('id' => "TC",
                'name' => 'Tim Commerford',
                'picture' => 'Tim_Commerford.jpg',
                'info' => 'Timothy Robert Commerford, né le 26 février 1968 à Irvine (Californie), également appelé Timmy C., Y.tim.K, Simmering T, Tim Bob, ou tim.com, est le bassiste de Rage Against the Machine, Audioslave et Prophets of Rage.'
            ),
            array('id' => "BW",
                'name' => 'Brad Wilk',
                'picture' => 'Brad_Wilk.jpg',
                'info' => 'Wilk commence à jouer de la batterie à ses 13 ans et il a un kit de batterie à 14 ans. Après avoir répondu à une annonce dans un journal local, Wilk rejoint Tom Morello, Tim Commerford, et Zack de la Rocha pour former Rage Against the Machine. Ils font ensemble 4 albums studio avant leur séparation. Wilk, Morello et Commerford créent alors Audioslave avec le chanteur de Soundgarden, Chris Cornell. Brad est un bouddhiste, et il est vu comme étant très compatissant. Il a un diabète de type 1 et a dit lors d\'une interview pour le magazine Countdown que s\'il ne faisait pas de la musique, il trouverait un traitement pour la maladie.'
            )
        );
    
        foreach ($artist as $a){
            $newArtist = new Artist();
            $newArtist->setName($a['name'])
                ->setInfo($a['info'])
                ->setPicture($a['picture']);
            $manager->persist($newArtist);

            $this->addReference($a['id'], $newArtist);
        }

        $manager->flush();
    }
}