<?php

namespace App\Controller;

use App\Entity\Variant;
use App\Form\VariantType;
use App\Repository\VariantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/variant")
 */
class VariantController extends AbstractController
{
    // /**
    //  * @Route("/", name="variant_index", methods={"GET"})
    //  */
    // public function index(VariantRepository $variantRepository): Response
    // {
    //     return $this->render('variant/index.html.twig', [
    //         'variants' => $variantRepository->findAll(),
    //     ]);
    // }

    // /**
    //  * @Route("/new", name="variant_new", methods={"GET","POST"})
    //  */
    // public function new(Request $request): Response
    // {
    //     $variant = new Variant();
    //     $form = $this->createForm(VariantType::class, $variant);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($variant);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('variant_index');
    //     }

    //     return $this->render('variant/new.html.twig', [
    //         'variant' => $variant,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/{id}", name="variant_show", methods={"GET"})
    //  */
    // public function show(Variant $variant): Response
    // {
    //     return $this->render('variant/show.html.twig', [
    //         'variant' => $variant,
    //     ]);
    // }

    // /**
    //  * @Route("/{id}/edit", name="variant_edit", methods={"GET","POST"})
    //  */
    // public function edit(Request $request, Variant $variant): Response
    // {
    //     $form = $this->createForm(VariantType::class, $variant);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('variant_index');
    //     }

    //     return $this->render('variant/edit.html.twig', [
    //         'variant' => $variant,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/{id}", name="variant_delete", methods={"DELETE"})
    //  */
    // public function delete(Request $request, Variant $variant): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$variant->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($variant);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('variant_index');
    // }
}
