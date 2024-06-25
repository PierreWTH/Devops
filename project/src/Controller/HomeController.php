<?php

namespace App\Controller;

use App\Repository\ScoreRepository;
use App\Repository\SynthesisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  private $synthesisRepository;
  private $scoreRepository;

  public function __construct(SynthesisRepository $synthesisRepository, ScoreRepository $scoreRepository)
  {
    $this->synthesisRepository = $synthesisRepository;
    $this->scoreRepository = $scoreRepository;
  }


  #[Route('/', name: 'app_home')]
  public function index(): Response
  {
    $syntheses = $this->synthesisRepository->findByUser();

    return $this->render('home/account.html.twig', [
      'syntheses' => $syntheses,
    ]);
  }

  #[Route('/synthesis/{id}', name: 'synthesis')]
  public function show($id): Response
  {
    $synthesis = $this->synthesisRepository->find($id);
    $scores = $this->scoreRepository->findBySynthesis($id);
    $axises = [];

    foreach ($scores as $score) {
      $question = $score->getQuestion();
      $couple = [
        'question' => $question,
        'score' => $score,
      ];
      $cat = $question->getCategory();
      $axis = $cat->getAxis();
      $axises[$axis->getId()]['content'] = $axis;
      $axises[$axis->getId()]['cats'][$cat->getId()]['content'] = $cat;
      $axises[$axis->getId()]['cats'][$cat->getId()]['couples'][] = $couple;
    }

    if (!$synthesis) {
      throw $this->createNotFoundException('No synthesis found for id ' . $id);
    }

    return $this->render('home/synthesis.html.twig', [
      'synthesis' => $synthesis,
      'axises' => $axises,
    ]);
  }
}
