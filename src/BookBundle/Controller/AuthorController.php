<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BookBundle\Entity\Authors;
use BookBundle\Form\Type\AuthorType;

class AuthorController extends Controller
{
    public function indexAction()
    {
         // Appel de l'entity Manager 
         $em = $this->getDoctrine()->getManager();
         $authors = $em
             ->getRepository('BookBundle:Authors')
             ->findAll();
 
         return $this->render('@Book/Author/index.html.twig', [
             "authors" => $authors
         ]);
    }

    public function createAction(Request $request)
    {
        $authors = new Authors;
        $form = $this->createForm(AuthorType::class, $authors);

        if($form->handleRequest($request)->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($authors);
            $em->flush();

            return $this->redirectToRoute('author_retrieve', [
                "id" =>$authors->getId()
            ]);
        }

        $form = $form->createView();

        return $this->render('BookBundle:Author:create.html.twig', [
            "form" => $form
        ]);
    }

    public function retrieveAction($id)
    {
         // Appel de l'entity Manager 
         $em = $this->getDoctrine()->getManager();
         $author = $em
             ->getRepository('BookBundle:Authors')
             ->find($id);
             // ->findBy([
             //     "slug" => $slug
             // ]);

        return $this->render('BookBundle:Author:retrieve.html.twig', [
            "author" => $author
        ]);
    }

    public function updateAction()
    {
        return $this->render('BookBundle:Author:update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('BookBundle:Author:delete.html.twig');
    }
}
