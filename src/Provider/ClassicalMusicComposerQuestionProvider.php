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
                [
                    (int) $composer->getBirthDate()->format('Y') - 1,
                    (int) $composer->getBirthDate()->format('Y'),
                    (int) $composer->getBirthDate()->format('Y') + 1,
                    (int) $composer->getBirthDate()->format('Y') + 2,
                ]
            );
        }
        return $questions;
    }
}