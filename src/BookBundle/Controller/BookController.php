<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BookBundle\Entity\Books;
use BookBundle\Form\Type\BookType;

class BookController extends Controller
{
    public function indexAction()
    {
         // Appel de l'entity Manager 
         $em = $this->getDoctrine()->getManager();
         $books = $em
             ->getRepository('BookBundle:Books')
             ->findAll();
 
         return $this->render('@Book/Book/index.html.twig', [
             "books" => $books
         ]);
    }

    public function createAction(Request $request)
    {
        $books = new Books;
        $form = $this->createForm(BookType::class, $books);

        if($form->handleRequest($request)->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($books);
            $em->flush();

            return $this->redirectToRoute('book_retrieve', [
                "id" =>$books->getId()
            ]);
        }

        $form = $form->createView();

        return $this->render('BookBundle:Book:create.html.twig', [
            "form" => $form
        ]);
    }

    public function retrieveAction()
    {
        return $this->render('BookBundle:Book:retrieve.html.twig');
    }

    public function updateAction()
    {
        return $this->render('BookBundle:Book:update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('BookBundle:Book:delete.html.twig');
    }
}
