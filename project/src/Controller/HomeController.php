<?php

namespace App\Controller;

use App\Repository\SynthesisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  private $synthesisRepository;

  public function __construct(SynthesisRepository $synthesisRepository)
  {
    $this->synthesisRepository = $synthesisRepository;
  }


  #[Route('/', name: 'app_home')]
  public function index(): Response
  {
    $syntheses = $this->synthesisRepository->findByUser();

    return $this->render('home/account.html.twig', [
      'syntheses' => $syntheses,
    ]);
  }

  #[Route('/synthesis/{id}', name: 'product_show')]
  public function show($id): Response
  {
    $synthesis = $this->synthesisRepository->find($id);

    if (!$synthesis) {
      throw $this->createNotFoundException('No synthesis found for id ' . $id);
    }

    return $this->render('synthesis/show.html.twig', [
      'product' => $synthesis,
    ]);
  }
}
