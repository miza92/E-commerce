<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Form\CategoryType;
use FOS\RestBundle\View\View;
use App\Repository\CategoryRepository;
use Symfony\Component\Validator\Validation;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CategoryController extends AbstractController
{
    /**
     * Lists all Articles.
     * @FOSRest\Get("/category/{id}/article")
     *
     * @return array
     */
    public function getCategoryId(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        
        // query for a single Product by its primary key (usually "id")
        $category = $repository->findBy(
            ['category' => $id]
        );
        //dd($category);
        
        return View::create($category, Response::HTTP_OK , []);
    }

     /**
     * Lists all Category.
     * @FOSRest\Get("/category")
     *
     * @return array
     */
    public function getCategorys()
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        
        // query for a single Product by its primary key (usually "id")
        $category = $repository->findall();
        // dd($category);
        return View::create($category, Response::HTTP_OK , []);
    }

    /**
     * Lists all Articles.
     * @FOSRest\Get("/category/{categoryId}")
     *
     * @return array
     */
    public function getCategoryAction(int $categoryId)
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        
        // query for a single Product by its primary key (usually "id")
        $category = $repository->findById($categoryId);
        
        return View::create($category, Response::HTTP_OK , []);
    }

    /**
     * Create Category.
     * @FOSRest\Post("/category")
     *
     * @return array
     */
    public function postCategoryAction(Request $request)
    {
        $category = new Category();
        $category->setName($request->get('name'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();
        return View::create($category, Response::HTTP_CREATED , []);
        
    }

     /**
     * @FOSRest\Post("api/admin/category/{id}/edit")
     */
    public function edit(Request $request, Category $category)
    {
        $content = json_decode(
            $request->getContent(),true
        );

        $name = $content['name']; 
        $image = $content['image'];

        $category->setName($name); 
        $category->setPicture($image); 

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($category);
        $manager->flush();

        return View::create(["success" => $category->getName(). " est modifier !"], Response::HTTP_OK , []);
    }

    /**
     * @FOSRest\Post("api/admin/category/new")
     */
    public function new(Request $request)
    {
        $category = new Category();
        $content = json_decode(
            $request->getContent(),true
        );

        $name = $content['name']; 
        $image = $content['image'];

        $category->setName($name); 
        $category->setPicture($image); 

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($category);
        $manager->flush();

        return View::create(["success" => $category->getName(). " est ajouter !"], Response::HTTP_OK , []);
    }

    /**
    * @FOSRest\Delete("api/admin/category/{id}")
    */
    public function delete(Request $request, Category $category) 
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($category);
        $manager->flush();
        
        return View::create(["success" => "La catégorie ".$category->getName(). " est bien supprimé"]);
    }



}
