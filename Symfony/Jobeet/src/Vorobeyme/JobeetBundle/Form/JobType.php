<?php

namespace Vorobeyme\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Vorobeyme\JobeetBundle\Entity\Job;

class JobType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', ['choices' => Job::getTypes(), 'expanded' => true])
            ->add('category')
            ->add('company')
            ->add('logo', null, ['label' => 'Company logo'])
            ->add('url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('how_to_apply', null, ['label' => 'How to apply?'])
            ->add('token')
            ->add('is_public', null, ['label' => 'Public?'])
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vorobeyme\JobeetBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vorobeyme_jobeetbundle_job';
    }
}
