<?php

namespace App\DataFixtures;

use App\Entity\Score;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ScoreFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager): void
  {
      // Fetch a Synthesis from reference set by SynthesisFixtures
      $synthesis = $this->getReference('synthesis_0');

      $datas = [
        [
          'grade' => 1,
          'comment' => "Ouvert aux propositions de formation",
        ],
        [
          'grade' => 1,
          'comment' => "Entre-aide encouragée",
        ],
        [
          'grade' => 2,
          'comment' => "Review de code, support",
        ],
        [
          'grade' => 0,
          'comment' => "Ressources humaines expérimentée insuffisantes",
        ],
        [
          'grade' => 1,
          'comment' => NULL,
        ],
        [
          'grade' => 2,
          'comment' => "Review de code, qualité de code demandée",
        ],
        [
          'grade' => 2,
          'comment' => "Sprint, réunion daily, SCRUM",
        ],
        [
          'grade' => 2,
          'comment' => "Tests fonctionnels, méthode AGILE, accompagnement du client",
        ],
        [
          'grade' => 1,
          'comment' => "Point mensuel, IDP",
        ],
        [
          'grade' => 2,
          'comment' => NULL,
        ],
        [
          'grade' => 2,
          'comment' => "Beaucoup de paramètres entre en compte (conception parfois externalisée)",
        ],
        [
          'grade' => 2,
          'comment' => "Imputation, saisie de temps, ticketing",
        ],
        [
          'grade' => 2,
          'comment' => "Système de tickets ergonomique",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "Agile",
        ],
        [
          'grade' => 2,
          'comment' => "Calendrier des livraisons",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 0,
          'comment' => "",
        ],
        [
          'grade' => 0,
          'comment' => "",
        ],
        [
          'grade' => 0,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 1,
          'comment' => "Actinet",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 1,
          'comment' => "Certains documents importants (comme le cahier des charges) sont envoyés par mail et pourrait plutôt être disponible au téléchargement pour tous les partis concernés sur la plateforme Actinet, utilisé pour géré les demandes du client.",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 2,
          'comment' => "Site internet, profil Linkedin, profil Linkedin des employés",
        ],
        [
          'grade' => 2,
          'comment' => "",
        ],
        [
          'grade' => 1,
          'comment' => "",
        ],
        [
          'grade' => 0,
          'comment' => "",
        ],
        [
          'grade' => 1,
          'comment' => "",
        ],
        [
          'grade' => 0,
          'comment' => "",
        ],
      ];

      foreach ($datas as $j => $data) {
        $score = new Score();
        $score->setGrade($data['grade']);
        $score->setComment($data['comment']);
        $score->setSynthesis($synthesis);

        // Fetch a Question from reference set by QuestionFixtures if applicable
        if ($this->hasReference('question_' . ($j+1))) {
          $question = $this->getReference('question_' . ($j+1));
          $score->setQuestion($question);
          $manager->persist($score);
        }
      }

    $manager->flush();
  }

  public function getDependencies(): array
  {
    return [
      SynthesisFixtures::class,
      QuestionFixtures::class, // Ensure you have QuestionFixtures if questions are being used
    ];
  }
}
