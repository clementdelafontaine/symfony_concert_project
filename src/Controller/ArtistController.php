<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist/{id}", name="artist")
     */
    public function band(int $id, ArtistRepository $artistRepository): Response
    {   
        if ($artistRepository->find($id) != null) {
            $artist = $artistRepository->find($id);
        }
        
        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }

    /**
     * @Route("/artists", name="artists_list")
     */
    public function artists_list(ArtistRepository $artistRepository): Response
    {
        if ($artistRepository->findAll() != null) {
            $artistsList = $artistRepository->findAll();
        }
        return $this->render('artist/list.html.twig', [
            'artists_list' => $artistsList,
        ]);
    }
}
