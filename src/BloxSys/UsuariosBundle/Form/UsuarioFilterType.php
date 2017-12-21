<?php

namespace BloxSys\UsuariosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * UsuarioFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class UsuarioFilterType extends AbstractType
{
        /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
         
            ->add('dni', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('role', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('nombreCompleto', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('email', Filters\TextFilterType::class, [
                'condition_pattern' => FilterOperands::OPERAND_SELECTOR,
            ])
            ->add('isActive', Filters\BooleanFilterType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'BloxSys\UsuariosBundle\Entity\Usuario',
            'csrf_protection'   => false,
            'validation_groups' => ['filtering'] // avoid NotBlank() constraint-related message
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bloxsys_usuariosbundle_usuariofiltertype';
    }


}
