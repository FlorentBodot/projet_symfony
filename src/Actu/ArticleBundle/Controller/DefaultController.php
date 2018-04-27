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
        // Appel de l'entity Manager 
        $em = $this->getDoctrine()->getManager();
        $articles = $em
            ->getRepository('ActuArticleBundle:Articles')
            ->findAll();

        return $this->render('@ActuArticle/Default/index.html.twig', [
            "articles" => $articles
        ]);
    }

    /**
     * Création d'un article
     */
    public function addAction(Request $request)
    {
        // Instance de l'entité
        $articles = new Articles;
        dump($articles);
        
        // Création du formulaire à partir du FormType et basé sur l'entité
        $form = $this->createForm( ArticlesType::class, $articles);

        // On capte la requete POST
        if ($form->handleRequest($request)->isSubmitted() ) {
            // Appel de l'Entity Manager
            $em = $this->getDoctrine()->getManager();

            // les données du formulaire "$form" sont automatiquement associées
            // à l'entité "$articles"
            
            // Ajoute les données de l'entité dans la mémoire de l'Entity Manager 
            $em->persist($articles);

            // Enregistre les données en BDD et vide la mémoire de l'entity Manager
            $em->flush();
            
            return $this->redirectToRoute('actu_article_retrieve', [
                "id" => $articles->getId(),
                "slug" => $articles->getSlug()
            ]);
        }
        // Génération de la vue 
        $form = $form->createView();
        
        // Envois du formulaire au fichier de vu
        return $this->render('@ActuArticle/Default/create.html.twig', [
            "form" => $form,
        ]);
    }

    public function retrieveAction($slug, $id)
    {
        // Appel de l'entity Manager 
        $em = $this->getDoctrine()->getManager();
        $article = $em
            ->getRepository('ActuArticleBundle:Articles')
            ->find($id);
            // ->findBy([
            //     "slug" => $slug
            // ]);
        
        return $this->render('@ActuArticle/Default/retrieve.html.twig', [
            "article" => $article
        ]);
    }

    public function updateAction(Request $request, $id)
    {
          // On retrouve l'article
          $em = $this->getDoctrine()->getManager();

          $article = $em
              ->getRepository('ActuArticleBundle:Articles')
              ->find($id);

        // -- Instance du formulaire

        $form = $this->createForm(ArticlesType::class, $article);

        // On capte l'envoi du formulaire
        if ($form->handleRequest($request)->isSubmitted() ) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            
            return $this->redirectToRoute('actu_article_retrieve', [
                "id" => $article->getId(),
                "slug" => $article->getSlug()
            ]);
        }

        $form = $form->createView();

        return $this->render('@ActuArticle/Default/update.html.twig', [
            "form" => $form
        ]);
    }

    public function deleteAction()
    {
        return $this->render('@ActuArticle/Default/delete.html.twig');
    }
}
