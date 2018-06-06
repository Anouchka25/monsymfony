<?php

namespace App\Form\Type;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
//use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num')
            ->add('numtva')
            //->add('logo', FileType::class, array('label' => 'Logo(JPG)'))
            ->add('datefacture')
            ->add('facturede')
            ->add('client')
            ->add('conditions')
            ->add('prestations', CollectionType::class, array(
            'entry_type' => PrestationType::class,
            'entry_options' => array('label' => false),
            'allow_add' => true,
            'by_reference' => false,
            'allow_delete' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }

    public function getName()
    {
        return 'facture';
    }
}
