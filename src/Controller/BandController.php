<?php

namespace App\Controller;

use App\Repository\BandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    /**
     * @Route("/band/{id}", name="band")
     */
    public function band(int $id, BandRepository $bandRepository): Response
    {   
        if ($bandRepository->find($id) != null) {
            $band = $bandRepository->find($id);
        }
        return $this->render('band/show.html.twig', [
            'band' => $band,
        ]);
    }

    /**
     * @Route("/bands", name="bands_list")
     */
    public function bands_list(BandRepository $bandRepository): Response
    {
        if ($bandRepository->findAll() != null) {
            $bandsList = $bandRepository->findAll();
        }
        return $this->render('band/list.html.twig', [
            'bands_list' => $bandsList,
        ]);
    }
}
