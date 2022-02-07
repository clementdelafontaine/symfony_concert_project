<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Repository\ConcertRepository;
use App\Form\ConcertType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;


class ConcertController extends AbstractController
{
    /**
     * @Route("/concert", name="concerts_list")
     */
    public function concert(ConcertRepository $concertRepository): Response
    {
        if ($concertRepository->findAll() != null) {
            $concerts = $concertRepository->findAll();
        }
        return $this->render('concert/list.html.twig', [
            'concerts' => $concerts,
            'success' => false,
        ]);
    }

    /**
     * Create a new concert
     * 
     * @Route("/concert/create", name="concert_create", methods={"GET","POST"})
     * @isGranted("ROLE_ADMIN")
     */
    public function createConcert(Request $request,  EntityManagerInterface $entityManager): Response
    {   
        $concert = new Concert(); 

        $form = $this->createForm(concertType::class, $concert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // holds the submitted values
            $concert = $form->getData();

            // perform some action
            $entityManager->persist($concert);
            $entityManager->flush();

            return $this->redirectToRoute('concert_success');
        }

        return $this->render('concert/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/concert/success", name="concert_success")
     */
    public function concertSuccess(ConcertRepository $concertRepository): Response
    {
        if ($concertRepository->findAll() != null) {
            $concerts = $concertRepository->findAll();
        }
        return $this->render('concert/list.html.twig', [
            'concerts' => $concerts,
            'success' => true,
        ]);
    }

    /**
     * @Route("/concert/delete/{id}", name="concert_delete")
     */
    public function delete(Request  $request, Concert $concert, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($concert);
        $entityManager->flush();

        return $this->redirectToRoute('concerts_list');
    }

    /**
     * @Route("/concert/edit/{id}", name="concert_edit")
     */
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager, ConcertRepository $concertRepository): Response
    {
        if ($concertRepository->find($id) != null) {
            $concert = $concertRepository->find($id);

            $form = $this->createForm(concertType::class, $concert);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // holds the submitted values
                $concert = $form->getData();

                // perform some action
                $entityManager->persist($concert);
                $entityManager->flush();

                return $this->redirectToRoute('concert_success');
            }

            return $this->render('concert/new.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('concerts_list');
    }


    /**
     * @Route("/concert/{id}", name="concert")
     */
    public function band(int $id, ConcertRepository $concertRepository): Response
    {   
        if ($concertRepository->find($id) != null) {
            $concert = $concertRepository->find($id);
        }
        return $this->render('concert/show.html.twig', [
            'concert' => $concert,
        ]);
    }

}
