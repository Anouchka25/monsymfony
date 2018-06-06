<?php

namespace App\Form\Type;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation', TextareaType::class, array('attr' => array('class' => 'tinymce')))
            ->add('quantite')
            ->add('prixht')
            ->add('taxe');

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class,
        ]);
    }

    public function getName()
    {
        return 'prestation';
    }
}
