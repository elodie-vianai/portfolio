<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Vich\UploaderBundle\Form\Type\VichFileType;

class TrainingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',                   TextType::class)
            ->add('type',                   ChoiceType::class, array(
                'choices'   => array(
                    ''                  => null,
                    'Diplôme'           => 'Diplôme',
                    'Certification'     => 'Certification',
                    'Formation'         => 'Formation',
                )
            ))
            ->add('mention',                ChoiceType::class, array(
                'choices'   => array(
                    ''              => 'P',
                    'Assez Bien'    => 'AB',
                    'Bien'          => 'B',
                    'Très bien'     => 'TB'
                )
            ))
            ->add('institution',            TextType::class)
            ->add('city',                   TextType::class)
            ->add('department',             EntityType::class, array(
                'class'             =>  'AppBundle\Entity\Department',
                'choice_label'      =>  'name',
                'multiple'          =>  false
            ))
            ->add(
                'imageFile',
                VichFileType::class,
                [
                    'required' => true,
                ])
            ->add('beginAt',                DateType::class)
            ->add('endAt',                  DateType::class)
            ->add('save',                   SubmitType::class)
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
            'data_class'    =>  'AppBundle\Entity\Training'
        ));
    }


    public function getBlockPrefix()
    {
        return 'crud-trainings';
    }
}