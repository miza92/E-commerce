<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use FOS\RestBundle\View\View;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Validation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @FOSRest\Get("api/admin/users")
     * 
     */
    public function allUsers()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users =  $repository->findAll();

        return View::create($users, Response::HTTP_OK , []);
      
    }

    /**
     * @FOSRest\Post("api/admin/users/new")
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $content = json_decode(
            $request->getContent(),true
        );

        $validator = Validation::createValidator();

        $constraint = new Assert\Collection(array(
            // the keys correspond to the keys in the input array
            'password' => new Assert\Length(array('min' => 3, 'minMessage'=>'Votre mot de passe doit contenir minimum 3 caracteres')),
            'email' => new Assert\Email(array('message'=> 'Votre email est incorrect')),
            'firstname' => new Assert\Length(array('min' => 2, 'minMessage'=>'Votre prenom doit contenir minimum 2 caracteres')),
            'name' => new Assert\Length(array('min' => 2, 'minMessage'=>'Votre nom doit contenir minimum 2 caracteres')),
            'adress'=> new Assert\Length(array('min' => 2, 'minMessage'=>'Votre adresse ne contient que 2 caractère')),
            'telephone'=> new Assert\Length(array('min' => 2, 'minMessage'=>'Votre adresse ne contient que 2 caractère')),
        ));

        $violations = $validator->validate($content, $constraint);

        if ($violations->count() > 0) {
            return View::create(["error" => (string)$violations], Response::HTTP_CONFLICT , []);
        }

        $email = $content['email'];
        $name = $content['name'];
        $firstname = $content['firstname'];
        $adress= $content['adress'];
        $telephone =$content['telephone'];
        $password = $content['password'];

        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setName($name);
        $user->setFirstname($firstname);
        $user->setFixedDeliveryPrice(false);
        $user->setAdress($adress);
        $user->setTelephone($telephone);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return View::create(["success" => $user->getEmail(). " est bien enregistré"], Response::HTTP_OK , []);

    }

    /**
     * @FOSRest\Get("api/admin/users/{id}")
     */
    public function show(User $user)
    {
        return View::create($user, Response::HTTP_OK , []);
    }

    /**
     * @FOSRest\Put("api/admin/users/{id}/edit")
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder)
    {
        $content = json_decode(
           $request->getContent(),true
        );

        $validator = Validation::createValidator();

        $constraint = new Assert\Collection(array(
            // the keys correspond to the keys in the input array
            'password' => new Assert\Length(array('min' => 3, 'minMessage'=>'Votre mot de passe doit contenir minimum 3 caracteres')),
            'email' => new Assert\Email(array('message'=> 'Votre email est incorrect')),
            'firstname' => new Assert\Length(array('min' => 2, 'minMessage'=>'Votre prenom doit contenir minimum 2 caracteres')),
            'name' => new Assert\Length(array('min' => 2, 'minMessage'=>'Votre nom doit contenir minimum 2 caracteres')),
            'adress'=> new Assert\Length(array('min' => 2, 'minMessage'=>'fgffffd')),
            'telephone'=> new Assert\Length(array('min' => 2, 'minMessage'=>'fgffffd')),
        ));

        $violations = $validator->validate($content, $constraint);

        if ($violations->count() > 0) {
            return View::create(["error" => (string)$violations], Response::HTTP_CONFLICT , []);
        }

        $email = $content['email'];
        $name = $content['name'];
        $firstname = $content['firstname'];
        $adress= $content['adress'];
        $telephone =$content['telephone'];
        $password = $content['password'];

        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setName($name);
        $user->setFirstname($firstname);
        $user->setFixedDeliveryPrice(false);
        $user->setAdress($adress);
        $user->setTelephone($telephone);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();

        return View::create(["success" => $user->getEmail(). " profil modifier"], Response::HTTP_OK , []);
    }
    
    /**
     * @FOSRest\Delete("api/admin/users/{id}")
     */
    public function delete(Request $request, User $user)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return View::create(["success" => $user->getEmail(). " est supprimé"], Response::HTTP_OK , []);
    }
}

