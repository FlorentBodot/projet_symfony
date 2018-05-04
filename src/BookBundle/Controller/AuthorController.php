<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookBundle:Default:index.html.twig');
    }

    public function createAction()
    {
        return $this->render('BookBundle:Default:create.html.twig');
    }

    public function retrieveAction()
    {
        return $this->render('BookBundle:Default:retrieve.html.twig');
    }

    public function updateAction()
    {
        return $this->render('BookBundle:Default:update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('BookBundle:Default:delete.html.twig');
    }
}
