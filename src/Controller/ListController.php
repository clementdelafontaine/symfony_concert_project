<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(): Response
    {
        return $this->render('list/index.html.twig', [
            'bandList' => [
                ['name' => 'Gaspard Augé'],
                 ['name' => 'Sebastien Tellier'],
                 ['name' => 'Mr Oizo']
            ]
        ]);
    }
}
