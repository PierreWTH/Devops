<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Question;
use App\Entity\Score;
use App\Entity\Synthesis;
use App\Form\QuestionType;
use App\Repository\AxisRepository;
use App\Repository\CategoryRepository;
use App\Repository\QuestionRepository;
use App\Repository\SynthesisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionsController extends AbstractController
{
  private $axisRepository;
  private $categoryRepository;
  private $questionRepository;
  private $synthesisRepository;

  public function __construct(AxisRepository $axisRepository, CategoryRepository $categoryRepository, QuestionRepository $questionRepository, SynthesisRepository $synthesisRepository)
  {
    $this->axisRepository = $axisRepository;
    $this->categoryRepository = $categoryRepository;
    $this->questionRepository = $questionRepository;
    $this->synthesisRepository = $synthesisRepository;
  }

  #[Route('/synthesis_start', name: 'start_synthesis')]
  public function startSynthesis(EntityManagerInterface $manager, Request $request): Response
  {
    $company = $this->getUser();
    $synthesis = new Synthesis();
    $synthesis->setCompany($company);
    $synthesis->setCreated(new \DateTime());
    $manager->persist($synthesis);
    $manager->flush();

    $axis = $this->axisRepository->find(1);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $sortedQuestions = [];
    foreach ($questions as $question) {
      $sortedQuestions[$question->getId()] = $question;
    }
    $questions = $sortedQuestions;

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      $handledData = [];
      $couple = [];
      foreach ($data as $key => $value) {
        $matches = [];
        if (preg_match("/^question\_/", $key, $matches)) {
          $couple['grade'] = $value;
        } else {
          $couple['comment'] = $value;
          $handledData[reset($matches)] = $couple;
          $couple = [];
        }
      }

      foreach ($handledData as $question_id => $couple) {
        $score = new Score();
        $score->setGrade($couple['grade']);
        $score->setComment($couple['comment']);
        $score->setSynthesis($synthesis);

        $question = $this->questionRepository->find($question_id);

        $score->setQuestion($question);
        $manager->persist($score);
      }

      return $this->redirectToRoute('synthesis_continue', [
        'synth' => $synthesis->getId(),
        'axis' => 2,
      ]);
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
    ]);
  }

  #[Route('/synthesis_continue/{synth}/{axis_id}', name: 'synthesis_continue')]
  public function synthesis_continue(EntityManagerInterface $manager, Request $request, $synth, $axis_id): Response
  {
    $synthesis = $this->synthesisRepository->find($axis_id);
    $axis = $this->axisRepository->find($axis_id);
    if (is_null($synthesis) || is_null($axis)) {
      return $this->redirectToRoute('app_home');
    }
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $sortedQuestions = [];
    foreach ($questions as $question) {
      $sortedQuestions[$question->getId()] = $question;
    }
    $questions = $sortedQuestions;

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();
      $handledData = [];
      $couple = [];
      foreach ($data as $key => $value) {
        $matches = [];
        if (preg_match("/^question\_/", $key, $matches)) {
          $couple['grade'] = $value;
        } else {
          $couple['comment'] = $value;
          $handledData[reset($matches)] = $couple;
          $couple = [];
        }
      }

      foreach ($handledData as $question_id => $couple) {
        $score = new Score();
        $score->setGrade($couple['grade']);
        $score->setComment($couple['comment']);
        $score->setSynthesis($synthesis);

        $question = $this->questionRepository->find($question_id);

        $score->setQuestion($question);
        $manager->persist($score);
      }

      return $this->redirectToRoute('synthesis_continue', [
        'synth' => $synthesis->getId(),
        'axis_id' => $axis_id + 1,
      ]);
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
    ]);
  }

  #[Route('/questions/numeric', name: 'questions_numeric')]
  public function numeric(Request $request): Response
  {
    $axis = $this->axisRepository->find(3);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();

      return $this->redirectToRoute('questions_analysis');
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
    ]);
  }

  #[Route('/questions/analysis', name: 'questions_analysis')]
  public function analysis(Request $request): Response
  {
    $axis = $this->axisRepository->find(4);
    $categories = $this->categoryRepository->findByAxis($axis);
    $questions = [];

    foreach ($categories as $category) {
      $categoryQuestions = $this->questionRepository->findByCategory($category);
      $questions = array_merge($questions, $categoryQuestions);
    }

    $form = $this->createForm(QuestionType::class, null, ['questions' => $questions]);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $data = $form->getData();

      return $this->redirectToRoute('app_home');
    }

    return $this->render('forms/questions.html.twig', [
      'form' => $form->createView(),
      'axis' => $axis,
      'categories' => $categories,
    ]);
  }
}
