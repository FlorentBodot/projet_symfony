<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookBundle:Book:index.html.twig');
    }

    public function createAction()
    {
        return $this->render('BookBundle:Book:create.html.twig');
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
