<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\QuizType;
use App\Provider\QuestionsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    private const QUIZ_SESSION_ID = 'quiz_questions';
    /**
     * @Route("/quiz", name="quiz")
     */
    public function quiz(QuestionsProvider $questionsProvider, RequestStack $requestStack, Request $request): Response
    {
        $session = $requestStack->getSession();
        $questions = $session->get(self::QUIZ_SESSION_ID, $questionsProvider->getQuestions());
        $session->set(self::QUIZ_SESSION_ID, $questions);

        $form = $this->createForm(QuizType::class, null, ['questions' => $questions]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $allCorrect = true;
            for ($count = 0; $count < count($questions); $count++) {
                $question = $form->get(sprintf('question-%s', $count));
                if ($question->getData() != $questions[$count]->getAnswer()) {
                    $question->addError(new FormError('Incorrect. Please try again.'));
                    $allCorrect = false;
                }
            }

            if ($allCorrect) {
                $session->remove(self::QUIZ_SESSION_ID);
                return $this->render('quiz_complete.html.twig');
            }
        }

        return $this->render('quiz.html.twig', ['form' => $form->createView()]);
    }
}