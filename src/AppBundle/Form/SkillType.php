<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',       TextType::class)
            ->add('level',      ChoiceType::class, array(
                'choices' => array(
                    ''                  => null,
                    'Débutant'          => 1,
                    'Intermédiaire'     => 2,
                    'Confirmé'          => 3,
                    'Expert'            => 4
                )
            ))
            ->add('imagePath',          FileType::class)
            ->add('category',   ChoiceType::class, array(
                'choices'   =>  array(
                    ''=>null,
                    'Bureautique'=>'Bureautique',
                    'Graphisme'=>'Graphisme',
                    'Langues'=>'Langues',
                    'Technologies'=>'Technologies'
                )))
            ->add('save',               SubmitType::class)
            ->getForm();

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event){
                $training = $event->getData();
                if (null === $training) {
                    return;
                }
            }
        );
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    =>  'AppBundle\Entity\Skill'
        ));
    }


    public function getBlockPrefix()
    {
        return 'crud-skills';
    }
}
