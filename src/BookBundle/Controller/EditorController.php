<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BookBundle\Entity\Editors;
use BookBundle\Form\Type\EditorType;

class EditorController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookBundle:Editor:index.html.twig');
    }

    public function createAction(Request $request)
    {
        $editors = new Editors;
        $form = $this->createForm(EditorType::class, $editors);

        if($form->handleRequest($request)->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($editors);
            $em->flush();

            return $this->redirectToRoute('editor_retrieve', [
                "id" =>$editors->getId()
            ]);
        }

        $form = $form->createView();

        return $this->render('BookBundle:Editor:create.html.twig', [
            "form" => $form
        ]);
    }

    public function retrieveAction()
    {
         // Appel de l'entity Manager 
        //  $em = $this->getDoctrine()->getManager();
        //  $editor = $em
        //      ->getRepository('BookBundle:Editors')
        //      ->find($id);
             // ->findBy([
             //     "slug" => $slug
             // ]);

        return $this->render('BookBundle:Editor:retrieve.html.twig', [
            "editor" => $editor
        ]);
    }

    public function updateAction()
    {
        return $this->render('BookBundle:Editor:update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('BookBundle:Editor:delete.html.twig');
    }
}
