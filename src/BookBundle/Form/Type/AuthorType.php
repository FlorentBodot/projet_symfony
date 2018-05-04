<?php

namespace BookBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AuthorType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder

            // champ "name" de la table "authors"
            ->add("firstname", TextType::class, [
                "label" => "Nom de l'auteur",
                "required" => true

            ])

             // champ "name" de la table "authors"
             ->add("lastname", TextType::class, [
                "label" => "Prénom de l'auteur",
                "required" => true

            ])

              // champ "name" de la table "authors"
              ->add("nickname", TextType::class, [
                "label" => "Pseudo de l'auteur",
                "required" => true

            ])

            // champ "cover" de la table "books"
            ->add("photo", TextType::class, [
                "label" => "Photo de l'auteur",
                "required" => false

            ])

            // champ "description" de la table "books"
            ->add("bio",TextareaType::class, [
                "label" => "Bio de l'auteur",
                "required" => false
            ] )
        ;
    }
}
