<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ConcertController extends AbstractController
{
    /**
     * @Route("/concert", name="concert")
     */
    public function index(): Response
    {
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'Licence APIDAE'
        ]);
    }
}
