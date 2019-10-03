<?php

namespace App\Controller;

use App\Entity\Variant;
use App\Entity\Produit;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;

class ProduitController extends AbstractController
{
    /**
     * Lists produit at ses variants.
     * @FOSRest\Get("/produit/{id}/variant")
     *
     * @return array
     */
    public function getVariantsAction(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(Variant::class);
        
        // query for a single Product by its primary key (usually "id")
        $produit = $repository->findBy(
            ['variant'=> $id]
        );
        
        return View::create($produit, Response::HTTP_OK , []);
    }

    /**
     * Lists all Produit.
     * @FOSRest\Get("/produit")
     *
     * @return array
     */
    public function getProduitsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        
        // query for a single Product by its primary key (usually "id")
        $produit = $repository->findall();
        
        return View::create($produit, Response::HTTP_OK , []);
    }

    /**
     * Lists all Produit.
     * @FOSRest\Get("/produit/{produitId}")
     *
     * @return array
     */
    public function getProduitAction(int $produitId)
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        
        // query for a single Product by its primary key (usually "id")
        $produit = $repository->findById($produitId);
        
        return View::create($produit, Response::HTTP_OK , []);
    }


    /**
     * Create Produit.
     * @FOSRest\Post("/produit")
     *
     * @return array
     */
    public function postProduitAction(Request $request)
    {
        //idée je instance category select where $id = id category
        $produit = new Produit();
        $produit->setName($request->get('name'));
        $produit->setDescription($request->get('description'));
        $produit->setArticle($request->get('article'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        return View::create($produit, Response::HTTP_CREATED , []);
        
    }
}
