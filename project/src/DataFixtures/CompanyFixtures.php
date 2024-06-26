<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompanyFixtures extends Fixture
{
  private UserPasswordHasherInterface $passwordHasher;

  public function __construct(UserPasswordHasherInterface $passwordHasher)
  {
    $this->passwordHasher = $passwordHasher;
  }

  public function load(ObjectManager $manager): void
  {
    $company = new Company();
    $company->setEmail('test@test.fr');
    $company->setRoles(['ROLE_COMPANY']);
    $hashedPassword = $this->passwordHasher->hashPassword($company, 'password');
    $company->setPassword($hashedPassword);
    $company->setName('Actimage');

    $manager->persist($company);

    $manager->flush();

    $this->addReference('company_1', $company);
  }
}
