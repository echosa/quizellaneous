<?php

declare(strict_types=1);

namespace App\Controller;

use App\Provider\QuestionsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @Route("/quiz", name="quiz")
     */
    public function quiz(QuestionsProvider $questionsProvider): Response
    {
        $questions = $questionsProvider->getQuestions();

        return $this->render('quiz.html.twig', ['questions' => $questions]);
    }
}