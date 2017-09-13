<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ExperienceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',               TextType::class)
            ->add('contract',               ChoiceType::class, array(
                'choices'   => array(
                    ''                                                      => null,
                    'CDD'                                                   => 'CDD',
                    'CDI'                                                   => 'CDI',
                    'CTT (Contrat de Travail Temporaire ou Intérim)'        => 'CTT',
                    'CUI (Contrat Unique d\'insertion)'                     => 'CUI',
                    'CAE (Contrat d\'Accompagnement dans l\'Emploi)'        => 'CAE',
                    'CIE (Contrat Initiative Emploi)'                       => 'CIE',
                    'Contrat d\apprentissage'                               => 'Apprentissage',
                    'Contrat de professionnalisation'                       => 'Professionnalisation',
                    'Stage'                                                 => 'Stage'
                )
            ))
            ->add('company',        TextType::class)
            ->add('city',               TextType::class)
            ->add('department',      EntityType::class, array(
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
            ->add('beginAt',            DateType::class)
            ->add('endAt',              DateType::class, array(
                'required'      =>  false,
            ))
            ->add('save',               SubmitType::class)
            ->getForm();

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event){
                $experience = $event->getData();
                if (null === $experience) {
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
            'data_class'    =>  'AppBundle\Entity\Experience'
        ));
    }


    public function getBlockPrefix()
    {
        return 'crud-experiences';
    }
}