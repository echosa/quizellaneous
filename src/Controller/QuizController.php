<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Question;
use App\Provider\QuestionsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

        $count = 1;
        $formBuilder = $this->createFormBuilder();
        /** @var Question $question */
        foreach ($questions as $question) {
            $formBuilder->add(
                sprintf('question-%s', $count),
                ChoiceType::class,
                [
                    'mapped' => false,
                    'expanded' => true,
                    'multiple' => false,
                    'label' => $question->getQuestion(),
                    'choices' => $question->getChoices(),
                    'choice_label' => function ($choice, $key, $value) {
                        return $value;
                    },
                ]
            );
            ++$count;
        }

        $form = $formBuilder
            ->add('save', SubmitType::class, ['label' => 'Check Answers'])
            ->getForm();

        return $this->render('quiz.html.twig', ['questions' => $questions, 'form' => $form->createView()]);
    }
}