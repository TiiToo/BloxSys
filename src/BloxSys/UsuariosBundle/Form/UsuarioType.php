<?php

namespace BloxSys\UsuariosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login')
            ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repeat Password')
            ))
            ->add('dni', TextType::class, array(
                'attr' => array(
                    'data-mask' => '99.999.999'
                )
            ))
            ->add('role', ChoiceType::class, array('choices' =>
                array('Administrador' => 'ROLE_ADMIN',
                'Usuario' => 'ROLE_USER'),
                'placeholder' => 'Seleccione un rol'))
            ->add('nombreCompleto')
                
            ->add('email', EmailType::class, array(
                'required' => false
                ))
            ->add('isActive')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'BloxSys\UsuariosBundle\Entity\Usuario'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bloxsys_usuariosbundle_usuario';
    }


}
