<?php

declare(strict_types=1);

namespace App\Model;

class Question implements QuestionInterface
{
    private string $question;

    public function __construct(
        string $question
    ) {
        $this->question = $question;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }
}