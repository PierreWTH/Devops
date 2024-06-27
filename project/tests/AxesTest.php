<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Axis;

class AxesTest extends ApiTestCase
{   
    private EntityManager $entityManager;
    
     /**
     * @test
     */
    public function can_retrieves_all_axes(): void
    {
        $client = self::createClient();

        // Get a token 

        $response = $client->request('GET', '/api/axes', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);

        $posts = $response->toArray();

        $this->assertResponseIsSuccessful(200);
        $this->assertCount(4, $posts, "Incorrect number of axes retrieved");

    }

    /**
     * @test
     */
    public function can_retrieves_an_axe(): void
    {
        $client = self::createClient();

        $axis = $this->getEntityManager()->getRepository(Axis::class)->findOneBy(['name' => 'Axe Numérique']);

        // Get a token 

        $response = $client->request('GET', '/api/axes/'.$axis->getId(), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);

        $responseAxis = $response->toArray();

        $this->assertResponseIsSuccessful(200);
        $this->assertEquals('Axe Numérique', $responseAxis['name'], "Incorrect name of the axis retrieved");

    }

    
    protected function getEntityManager()
    {
        return self::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

}