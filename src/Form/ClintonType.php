<?php

namespace App\Form;

use App\Entity\Clinton;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ClintonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('firstName',  TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'prenom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('ages',  IntegerType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'age',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('sex' ,  TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'sex',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('adress',  TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'adress',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('image',  TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'image',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('mail',  EmailType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label'=> 'mail',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints'=> [
                    new Assert\Length(['min'=>2 , 'max'=> 50]),
                    
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' =>[
                    'class' =>'btn btn-primary'  
                ],
                'label'=> 'enregistrer'
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clinton::class,
        ]);
    }
}
