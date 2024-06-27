<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\AxisRepository;
use App\Repository\CategoryRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionsController extends AbstractController
{
  private $axisRepository;
  private $categoryRepository;
  private $questionRepository;

  public function __construct(AxisRepository $axisRepository, CategoryRepository $categoryRepository, QuestionRepository $questionRepository)
  {
    $this->axisRepository = $axisRepository;
    $this->categoryRepository = $categoryRepository;
    $this->questionRepository = $questionRepository;
  }

  #[Route('/questions/skill', name: 'questions_skill')]
  public function skill(Request $request): Response
  {
    $axis = $this->axisRepository->find(1);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];
    $idPrefix = "skill";

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    dd($form->isSubmitted(), $form);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();

      return $this->redirectToRoute('questions_reactivity');
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
      'idPrefix' => $idPrefix,
    ]);
  }

  #[Route('/questions/reactivity', name: 'questions_reactivity')]
  public function reactivity(Request $request): Response
  {
    $axis = $this->axisRepository->find(1);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];
    $idPrefix = "reactivity";

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();

      return $this->redirectToRoute('questions_numeric');
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
      'idPrefix' => $idPrefix,
    ]);
  }

  #[Route('/questions/numeric', name: 'questions_numeric')]
  public function numeric(Request $request): Response
  {
    $axis = $this->axisRepository->find(1);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];
    $idPrefix = "numeric";

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();

      return $this->redirectToRoute('questions_');
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
      'idPrefix' => $idPrefix,
    ]);
  }
}
