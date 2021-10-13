<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\Question;

class ClassicalMusicComposerQuestionProvider
{
    private ClassicalMusicComposerProvider $classicalMusicComposerProvider;

    public function __construct(
        ClassicalMusicComposerProvider $classicalMusicComposerProvider
    ) {
        $this->classicalMusicComposerProvider = $classicalMusicComposerProvider;
    }

    public function all(): array
    {
        $questions = [];

        foreach ($this->classicalMusicComposerProvider->all() as $composer) {
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