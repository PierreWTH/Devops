<?php

namespace App\DataFixtures;

use App\Entity\Axis;
use App\Entity\Category;
use App\Entity\Question;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AxisFixtures extends Fixture 
{
    public const SKILL_REFERENCE = 'skill';
    public const REACTIVIY_REFERENCE = 'reactivity';
    public const NUMERIC_REFERENCE = 'numeric';
    public const ANALYSIS_REFERENCE = 'analysis';


    public function load(ObjectManager $manager): void
    {

        $axis = ['Axe compétence', 'Axe réactivité', 'Axe numérique', 'Analyse numérique par métier'];

            $axis = new Axis;
            $axis->setName('Axe compétence');
            $this->addReference(self::SKILL_REFERENCE, $axis);
            
            $manager->persist($axis);

            $axis2 = new Axis;
            $axis2->setName('Axe reactivité');
            $this->addReference(self::REACTIVIY_REFERENCE, $axis2);
            
            $manager->persist($axis2);

            $axis3 = new Axis;
            $axis3->setName('Axe numérique');
            $this->addReference(self::NUMERIC_REFERENCE, $axis3);
            
            $manager->persist($axis3);

            $axis4 = new Axis;
            $axis4->setName('Analyse numérique par métier');
            $this->addReference(self::ANALYSIS_REFERENCE, $axis4);
            
            $manager->persist($axis4);

        $manager->flush();
    }
}
