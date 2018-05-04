<?php

namespace BookBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder

            // champ "name" de la table "books"
            ->add("title", TextType::class, [
                "label" => "Titre du livre",
                "required" => true

            ])

            // champ "cover" de la table "books"
            ->add("cover", TextType::class, [
                "label" => "Couverture du livre",
                "required" => false

            ])

            // champ "description" de la table "books"
            ->add("summary",TextareaType::class, [
                "label" => "Description du livre",
                "required" => false
            ] )
        ;
    }
}
