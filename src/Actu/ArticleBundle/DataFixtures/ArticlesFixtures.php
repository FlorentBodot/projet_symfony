<?php

namespace ArticleBundle\DataFixtures;

use Actu\ArticleBundle\Entity\Articles;

// Gestionnaire des fixtures de Doctrine
use Doctrine\Bundle\FixturesBundle\Fixture;
// Gestionnaire du Domain object de Doctrine
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;

// L'entité Articles

class ArticlesFixtures extends Fixture implements ORMFixtureInterface {

    public function load(ObjectManager $manager) {
        $articles = new Articles();

        // title 
        $articles->setTitle("Le titre de mon article");

        // content
        $articles->setContent("Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas eveniet ad omnis. Eligendi quae laborum earum magni aliquam, pariatur rerum asperiores dignissi.");

        $manager->persist($articles);

        $manager->flush();

    }

    
}

