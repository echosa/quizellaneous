<?php

declare(strict_types=1);

namespace App\Provider;

class QuestionsProvider
{
    private ClassicalMusicComposerQuestionProvider $classicalMusicComposerQuestionProvider;
    private TeaQuestionProvider $teaQuestionProvider;

    public function __construct(
        ClassicalMusicComposerQuestionProvider $classicalMusicComposerQuestionProvider,
        TeaQuestionProvider $teaQuestionProvider
    ) {
        $this->classicalMusicComposerQuestionProvider = $classicalMusicComposerQuestionProvider;
        $this->teaQuestionProvider = $teaQuestionProvider;
    }

    public function getQuestions(): array
    {
        $questions = [];

        $questions = array_merge($questions, $this->classicalMusicComposerQuestionProvider->all());
        $questions = array_merge($questions, $this->teaQuestionProvider->all());

        shuffle($questions);

        return $questions;
    }
}