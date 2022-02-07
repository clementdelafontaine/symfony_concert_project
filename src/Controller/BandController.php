<?php

namespace App\Controller;

use App\Entity\Band;
use App\Form\BandType;
use App\Repository\BandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class BandController extends AbstractController
{

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
            'success' => false,
        ]);
    }

    /**
     * Create a new band
     * 
     * @Route("/band/create", name="band_create", methods={"GET","POST"})
     * @isGranted("ROLE_ADMIN")
     */
    public function createband(Request $request,  EntityManagerInterface $entityManager): Response
    {   
        $band = new Band(); 

        $form = $this->createForm(BandType::class, $band);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // holds the submitted values
            $band = $form->getData();

            // perform some action
            $entityManager->persist($band);
            $entityManager->flush();

            return $this->redirectToRoute('band_success');
        }

        return $this->render('band/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/band/edit/{id}", name="band_edit")
     * @isGranted("ROLE_ADMIN")
     */
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager, BandRepository $bandRepository): Response
    {
        if ($bandRepository->find($id) != null) {
            $band = $bandRepository->find($id);

            $form = $this->createForm(bandType::class, $band);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // holds the submitted values
                $band = $form->getData();

                // perform some action
                $entityManager->persist($band);
                $entityManager->flush();

                return $this->redirectToRoute('band_success');
            }

            return $this->render('band/new.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('bands_list');
    }

    /**
     * @Route("/band/delete/{id}", name="band_delete")
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request  $request, Band $band, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($band);
        $entityManager->flush();

        return $this->redirectToRoute('bands_list');
    }

    /**
     * @Route("/band/success", name="band_success")
     */
    public function bandSuccess(BandRepository $bandRepository): Response
    {
        if ($bandRepository->findAll() != null) {
            $bands = $bandRepository->findAll();
        }
        return $this->render('band/list.html.twig', [
            'bands_list' => $bands,
            'success' => true,
        ]);
    }

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
}
