<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', texttype::class,[
                'label' => 'Prénom',
                'attr'=> [
                    'placeholder'=>"Merci de saisir le prénom de l'utilisateur"
                ]
            ])
            ->add('lastname', texttype::class,[
                'label' => 'Nom',
                'attr'=> [
                    'placeholder'=>"Merci de saisir le Nom de l'utilisateur"
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Adresse Email',
                'attr'=> [
                    'placeholder'=>"Merci de saisir l'adresse Email de l'utilisateur"
                ]
            ])
            ->add('password',PasswordType::class,[
                'label' => 'Mot de passe',
                'attr'=> [
                    'placeholder'=>"Merci de definir le mot de passe de l'utilisateur"
                 ]
            ])
            ->add('password_confirm',PasswordType::class,[
                'label'=> "Confirmez le mot de passe ",
                'mapped'=> false,
                'attr'=> [
                    'placeholder'=>"Merci de confirmer le mot de passe de l'utilisateur"
                        ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Valider"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
