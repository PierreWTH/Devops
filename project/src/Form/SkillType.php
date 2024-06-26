<?php

namespace App\Form;

use App\Entity\Axis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $questions = [
            'Formations pour Apprendre à apprendre, changement de paradigme, "être à la page" (au-delà des compétences "justes" nécessaires)' => 'formation',
            'Le co-développement (outil d\'intelligence collective) existe-t-il dans l\'entreprise ?' => 'co_developpement',
            'Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?' => 'partage_competences',
            'Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?' => 'mentoring',
            'Les managers sont-ils aussi formateurs sur certains sujet pour l\'entreprise entière ?' => 'managers_formateurs',
            'L\'entreprise favorise-t-elle l\'excellence technique ? (Principe 9 du Manifeste Agile)' => 'excellence_technique',
            'Déployez vous les pratiques du "Faire Agile", c\'est-à-dire une ou plusieurs des "méthodes" agiles ?' => 'faire_agile',
            'Votre entreprise promeut-elle un "état d\'esprit agile" ?' => 'esprit_agile',
            'Votre entreprise gère-t-elle humainement les compétences ?' => 'gestion_competences'
        ];

        foreach ($questions as $label => $name) {
            $builder->add($name, ChoiceType::class, [
                'label' => $label,
                'choices' => [
                    '2' => 2,
                    '1' => 1,
                    '0' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
            ]);
        }

        $builder->add('submit', SubmitType::class, [
            'label' => 'Suivant',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }
}
