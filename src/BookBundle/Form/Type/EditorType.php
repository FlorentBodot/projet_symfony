<?php

namespace BookBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EditorType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder

            // champ "name" de la table "editors"
            ->add("name", TextType::class, [
                "label" => "Nom de l'auteur",
                "required" => true

            ])
            // champ "description" de la table "éditors"
            ->add("description",TextareaType::class, [
                "label" => "Description de l'auteur",
                "required" => false
            ] )
        ;
    }
}
