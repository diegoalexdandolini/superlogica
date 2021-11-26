<?php

namespace App\Form;

use App\Entity\UserForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'minlength'     => '3',
                    'maxlength'     => '100',
                    'placeholder'   => 'Nome',
                ]
            ])
            ->add('user_name', TextType::class, [
                'attr' => [
                    'minlength'     => '3',
                    'maxlength'     => '100',
                    'placeholder'   => 'Nome de usuario'
                ]
            ])
            ->add('zip_code', TextType::class, [
                'attr' => [
                    'pattern'       => '.{9}',
                    'minlength'     => '9',
                    'maxlength'     => '9',
                    'placeholder'   => '000000-000'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'minlength'     => '7',
                    'maxlength'     => '255',
                    'placeholder'   => 'example@email.com'
                ]
            ])
            ->add('password',  PasswordType::class, [
                'attr' => [
                    'minlength' => '8',
                    'maxlength' => '100',
                    'placeholder' => '(8 caracteres mínimo, contendo pelo menos 1 letra e 1 número'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserForm::class,
        ]);
    }
}
