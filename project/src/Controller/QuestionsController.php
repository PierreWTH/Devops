<?php

namespace App\Controller;

use App\Form\SkillType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionsController extends AbstractController
{
  #[Route('/questions/skill', name: 'questions_skill')]
  public function skill(Request $request): Response
  {
    $form = $this->createForm(SkillType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Process form data
            $data = $form->getData();
            // Save to database or perform other actions

            return $this->redirectToRoute('questions_reactivity'); // Adjust to your next route
        }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  #[Route('/questions/reactivity', name: 'questions_reactivity')]
  public function reactivity(): Response
  {
    return $this->render('forms/questions.html.twig', []);
  }

  #[Route('/questions/numeric', name: 'questions_numeric')]
  public function numeric(): Response
  {
    return $this->render('forms/questions.html.twig', []);
  }
}
