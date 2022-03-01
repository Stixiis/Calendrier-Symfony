<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', texttype::class,[
                'label' => 'Prénom',
                'constraints' => new Length(0,2,30),
                'attr'=> [
                    'placeholder'=>"Merci de saisir le prénom de l'utilisateur"
                ]
            ])
            ->add('lastname', texttype::class,[
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' =>2,
                    'max' =>30,
                ]),
                'attr'=> [
                    'placeholder'=>"Merci de saisir le Nom de l'utilisateur"
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Adresse Email',
                'constraints' => new Length([
                    'min' =>2,
                    'max' =>40,
                ]),
                'attr'=> [
                    'placeholder'=>"Merci de saisir l'adresse Email de l'utilisateur"
                ]
            ])
            ->add('password',RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' =>'le mot de passe et la confirmation doivent etre identique',
                'label' => 'Mot de passe',
                'constraints' => new Length([
                    'min' =>6,
                    'max' =>30,
                ]),
                'required' => true,
                'first_options' => [
                    'label'=> 'Mot de passe',
                    'attr'=> [
                'placeholder'=>'Veuillez renseigner un Mot de passe'
                ]
                ],
                'second_options' => [
                    'label'=> 'Confirmez votre mot de passe',
                'attr'=> [
                    'placeholder'=>'Veuillez re-renseigner le Mot de passe'
                ]
            ],
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
