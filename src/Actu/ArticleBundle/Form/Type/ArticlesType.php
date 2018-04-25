<?php

namespace Actu\ArticleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticlesType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            // <input type="text" name="title">
            ->add("title", TextType::class, [
                "label" => "Titre de l'article",

            ])
            ->add("content",TextareaType::class, [
                "label" => "Contenu de l'article",
                "attr" => [
                    "placeholder" => "Saisir votre article ici..."
                ]
            ] )
        ;
    }
}
