<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionsController extends AbstractController
{
    #[Route('/questions/skill', name: 'questions_skill')]
    public function skill(): Response
    {
        return $this->render('forms/questions.html.twig', [
        ]);
    }

    #[Route('/questions/reactivity', name: 'questions_reactivity')]
    public function reactivity(): Response
    {
        return $this->render('forms/questions.html.twig', [
        ]);
    }

    #[Route('/questions/numeric', name: 'questions_numeric')]
    public function numeric(): Response
    {
        return $this->render('forms/questions.html.twig', [
        ]);
    }
}
