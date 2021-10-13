<?php

declare(strict_types=1);

namespace App\Provider;

class QuestionsProvider
{
    private ClassicalMusicComposerQuestionProvider $classicalMusicComposerQuestionProvider;

    public function __construct(
        ClassicalMusicComposerQuestionProvider $classicalMusicComposerQuestionProvider
    ) {
        $this->classicalMusicComposerQuestionProvider = $classicalMusicComposerQuestionProvider;
    }

    public function getQuestions(): array
    {
        $questions = [];

        $questions = array_merge($questions, $this->classicalMusicComposerQuestionProvider->all());

        shuffle($questions);

        return $questions;
    }
}