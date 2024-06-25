<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $question = new Question;
        $question->setText('Formations pour Apprendre à apprendre, changement de paradigme, "être à la page" (au-delà des compétences "justes" nécessaires)');
        $question->setAnswer1('Excellence Technique/Communauté de pratiques');
        $question->setAnswer2('Faire agile');
        $question->setanswer0('Gestion');
        $manager->flush();
    }
}
