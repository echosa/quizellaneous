<?php

declare(strict_types=1);

namespace App\Controller;

use App\Provider\ClassicalMusicComposerQuestionProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @Route("/quiz", name="quiz")
     */
    public function quiz(ClassicalMusicComposerQuestionProvider $classicalMusicComposerQuestionProviderProvider): Response
    {
        $questions = $classicalMusicComposerQuestionProviderProvider->all();

        return $this->render('quiz.html.twig', ['questions' => $questions]);
    }
}