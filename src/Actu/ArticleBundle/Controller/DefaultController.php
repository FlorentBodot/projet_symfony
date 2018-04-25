<?php

namespace Actu\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Actu\ArticleBundle\Entity\Articles;
use Actu\ArticleBundle\Form\Type\ArticlesType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ActuArticle/Default/index.html.twig');
    }

    public function addAction()
    {
        // Instance de l'entité
        $articles = new Articles;

        // Création du formulaire à partir du FormType et basé sur l'entité
        $form = $this->createForm( ArticlesType::class, $articles);

        // Envois du formulaire au fichier de vu
        $form = $form->createView();

        return $this->render('@ActuArticle/Default/create.html.twig', [
            "form" => $form,
        ]);
    }

    public function retrieveAction()
    {
        return $this->render('@ActuArticle/Default/retrieve.html.twig');
    }

    public function updateAction()
    {
        return $this->render('@ActuArticle/Default/update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('@ActuArticle/Default/delete.html.twig');
    }
}
