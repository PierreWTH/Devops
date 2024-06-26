<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('email', EmailType::class, [
        'attr' => ['class' => 'form-control'],
        'label_attr' => ['class' => 'form-label'],
      ])
      ->add('name', TextType::class, [
        'attr' => ['class' => 'form-control'],
        'label_attr' => ['class' => 'form-label'],
      ])
      ->add('plainPassword', PasswordType::class, [
        'mapped' => false,
        'attr' => [
          'autocomplete' => 'new-password',
          'class' => 'form-control'
        ],
        'label_attr' => ['class' => 'form-label'],
        'constraints' => [
          new NotBlank([
            'message' => 'Merci d\'entrer un mot de passe',
          ]),
          new Length([
            'min' => 6,
            'minMessage' => 'Your password should be at least {{ limit }} characters',
            'max' => 4096,
          ]),
        ],
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Company::class,
    ]);
  }
}
