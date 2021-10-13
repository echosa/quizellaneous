<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\Question;
use App\Repository\ClassicalMusicComposerRepository;

class ClassicalMusicComposerQuestionProvider
{
    private ClassicalMusicComposerRepository $classicalMusicComposerRepository;

    public function __construct(
        ClassicalMusicComposerRepository $classicalMusicComposerRepository
    ) {
        $this->classicalMusicComposerRepository = $classicalMusicComposerRepository;
    }

    public function all(): array
    {
        $questions = [];

        foreach ($this->classicalMusicComposerRepository->findAll() as $composer) {
            $questions[] = new Question(
                sprintf('What year was %s born?', $composer->getName()),
                $composer->getBirthDate()->format('Y'),
                $this->generateNumericChoices((int) $composer->getBirthDate()->format('Y'))
            );

            $questions[] = new Question(
                sprintf('What year did %s die?', $composer->getName()),
                $composer->getDeathDate()->format('Y'),
                $this->generateNumericChoices((int) $composer->getDeathDate()->format('Y'))
            );
        }
        return $questions;
    }

    private function generateNumericChoices(int $answer): array
    {
        $options = [];

        for ($option = $answer - 10; $option <= $answer + 10; $option++) {
            if ($option === $answer) {
                continue;
            }
            $options[] = $option;
        }

        shuffle($options);

        $choices = array_slice($options, 0, 3);
        $choices[] = $answer;
        shuffle($choices);

        return $choices;
    }
}