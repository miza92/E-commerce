<?php

namespace App\Controller;

use App\Entity\PictureProduit;
use App\Form\PictureProduitType;
use App\Repository\PictureProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/picture/produit")
 */
class PictureProduitController extends AbstractController
{
    /**
     * @Route("/", name="picture_produit_index", methods={"GET"})
     */
    public function index(PictureProduitRepository $pictureProduitRepository): Response
    {
        return $this->render('picture_produit/index.html.twig', [
            'picture_produits' => $pictureProduitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="picture_produit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pictureProduit = new PictureProduit();
        $form = $this->createForm(PictureProduitType::class, $pictureProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pictureProduit);
            $entityManager->flush();

            return $this->redirectToRoute('picture_produit_index');
        }

        return $this->render('picture_produit/new.html.twig', [
            'picture_produit' => $pictureProduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="picture_produit_show", methods={"GET"})
     */
    public function show(PictureProduit $pictureProduit): Response
    {
        return $this->render('picture_produit/show.html.twig', [
            'picture_produit' => $pictureProduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="picture_produit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PictureProduit $pictureProduit): Response
    {
        $form = $this->createForm(PictureProduitType::class, $pictureProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('picture_produit_index');
        }

        return $this->render('picture_produit/edit.html.twig', [
            'picture_produit' => $pictureProduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="picture_produit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PictureProduit $pictureProduit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pictureProduit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pictureProduit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('picture_produit_index');
    }
}
