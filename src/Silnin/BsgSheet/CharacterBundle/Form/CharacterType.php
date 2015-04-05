<?php

namespace Silnin\BsgSheet\CharacterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CharacterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('createDate')
            ->add('description')
            ->add('homeworld')
            ->add('callsign')
            ->add('plotPoints')
            ->add('advancementPoints')
            ->add('woundRating')
            ->add('stunRating')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Silnin\BsgSheet\CharacterBundle\Entity\Character'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'silnin_bsgsheet_characterbundle_character';
    }
}
