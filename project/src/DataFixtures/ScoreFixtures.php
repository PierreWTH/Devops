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
    for ($i = 0; $i < 10; $i++) {
      // Fetch a Synthesis from reference set by SynthesisFixtures
      $synthesis = $this->getReference('synthesis_' . $i);

      for ($j = 1; $j <= 63; $j++) {
        $score = new Score();
        $score->setGrade(mt_rand(0, 2));
        $score->setComment('This is a comment for score ' . ($i * 63 + $j));
        $score->setSynthesis($synthesis);

        // Fetch a Question from reference set by QuestionFixtures if applicable
        if ($this->hasReference('question_' . $j)) {
          $question = $this->getReference('question_' . $j);
          $score->setQuestion($question);
          $manager->persist($score);
        }
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
