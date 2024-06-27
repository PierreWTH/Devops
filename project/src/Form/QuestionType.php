<?php

namespace App\Form;

use App\Entity\Axis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $questions = $options['questions'];

    foreach ($questions as $index => $question) {
      $builder->add('question_' . $index, ChoiceType::class, [
          'choices' => [
              '2' => 2,
              '1' => 1,
              '0' => 0,
          ],
          'expanded' => true,
          'multiple' => false,
          'label'=> false,
          // 'attr' => ['class' => 'd-none'],
      ]);
      $builder->add('comment_' . $index, null, [
          'label' => false,
          'attr' => [
            'placeholder' => 'Commentaire',
            'class' => 'form-control'
          ],
          'required' => false,
      ]);
    }

    $builder->add('submit', SubmitType::class, [
      'label' => 'Suivant',
      'attr' => ['class' => 'btn btn-primary'],
    ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      // Define default options
      'questions' => [],
    ]);
  }
}

