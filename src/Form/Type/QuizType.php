<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Model\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $count = 1;

        /** @var Question $question */
        foreach ($options['questions'] as $question) {
            $builder->add(
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

        $builder
            ->add('save', SubmitType::class, ['label' => 'Check Answers']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'questions' => [],
        ]);

        $resolver->setAllowedTypes('questions', 'array');
    }
}