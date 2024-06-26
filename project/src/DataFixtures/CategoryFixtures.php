<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
  // Compétence
  public const EXCELLENCE_REFERENCE = 'excellence';
  public const AGILE_REFERENCE = 'agile';
  public const GESTION_REFERENCE = 'gestion';

  // Réactivité
  public const VELOCITY_REFERENCE = 'velocity';
  public const SOUPLES_REFERENCE = 'souples';
  public const DEFI_REFERENCE = 'defi';
  public const VEILLE_REFERENCE = 'veille';

  // Numérique

  public const BUSINESS_REFERENCE = 'business';
  public const RELATION_REFERENCE = 'relation';
  public const MANAGEMENT_REFERENCE = 'management';

  // Analyse

  public const INDUSTRIAL_REFERENCE = 'industrial';
  public const MARKETING_REFERENCE = 'marketing';
  public const RH_REFERENCE = 'rh';
  public const SI_REFERENCE = 'si';
  public const BTP_REFERENCE = 'btp';
  public const QSERSE_REFERENCE = 'qserse';

    
  public function load(ObjectManager $manager): void
    {   
        // Axe compétence

        $category = new Category;
        $category->setName('Excellence Technique/Communauté de pratiques');
        $category->setAxis($this->getReference(AxisFixtures::SKILL_REFERENCE));
        $this->addReference(self::EXCELLENCE_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('Faire agile');
        $category->setAxis($this->getReference(AxisFixtures::SKILL_REFERENCE));
        $this->addReference(self::AGILE_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('Gestion humaine des compétences');
        $category->setAxis($this->getReference(AxisFixtures::SKILL_REFERENCE));
        $this->addReference(self::GESTION_REFERENCE, $category);

        $manager->persist($category);

        // Axe Réactivité

        $category = new Category;
        $category->setName('Vélocité de réponse');
        $category->setAxis($this->getReference(AxisFixtures::REACTIVIY_REFERENCE));
        $manager->persist($category);

        $this->addReference(self::VELOCITY_REFERENCE, $category);

        $category = new Category;
        $category->setName('Environnement souples');
        $category->setAxis($this->getReference(AxisFixtures::REACTIVIY_REFERENCE));
        $manager->persist($category);

        $this->addReference(self::SOUPLES_REFERENCE, $category);

        $category = new Category;
        $category->setName('Défi environnemental');
        $category->setAxis($this->getReference(AxisFixtures::REACTIVIY_REFERENCE));
        $manager->persist($category);

        $this->addReference(self::DEFI_REFERENCE, $category);

        $category = new Category;
        $category->setName('Veille et benchmark');
        $category->setAxis($this->getReference(AxisFixtures::REACTIVIY_REFERENCE));
        $this->addReference(self::VEILLE_REFERENCE, $category);
        $manager->persist($category);
        
        // Axe numérique

        $category = new Category;
        $category->setName('Business model');
        $category->setAxis($this->getReference(AxisFixtures::NUMERIC_REFERENCE));
        $manager->persist($category);

        $this->addReference(self::BUSINESS_REFERENCE, $category);

        $category = new Category;
        $category->setName('Relation client');
        $category->setAxis($this->getReference(AxisFixtures::NUMERIC_REFERENCE));
        $manager->persist($category);

        $this->addReference(self::RELATION_REFERENCE, $category);

        $category = new Category;
        $category->setName('Management');
        $category->setAxis($this->getReference(AxisFixtures::NUMERIC_REFERENCE));
        $this->addReference(self::MANAGEMENT_REFERENCE, $category);

        $manager->persist($category);
        
        // Analyse numérique par métier

        $category = new Category;
        $category->setName('Performances industrielles');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::INDUSTRIAL_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('Marketing digital');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::MARKETING_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('Ressources humaines');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::RH_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('Systèmes d\'information');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::SI_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('BTP');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::BTP_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category;
        $category->setName('QSE/RSE');
        $category->setAxis($this->getReference(AxisFixtures::ANALYSIS_REFERENCE));
        $this->addReference(self::QSERSE_REFERENCE, $category);
        $manager->persist($category);
        
        $manager->flush($category);
        
    }

    public function getDependencies()
    {
        return [
            AxisFixtures::class,
        ];
    }

}
