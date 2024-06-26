<?php

namespace App\DataFixtures;

use App\Entity\Synthesis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SynthesisFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager): void
  {
    // Fetch a company from reference set by CompanyFixtures
    $company = $this->getReference('company_1');

    $synthesis = new Synthesis();
    $synthesis->setCompany($company);
    $synthesis->setCreated(new \DateTime());

    $manager->persist($synthesis);
    $this->addReference('synthesis_0', $synthesis);

    $manager->flush();
  }

  public function getDependencies(): array
  {
    return [
      CompanyFixtures::class,
    ];
  }
}
