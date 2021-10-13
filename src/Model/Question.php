<?php

declare(strict_types=1);

namespace App\Model;

class Question implements QuestionInterface
{
    private string $question;
    private string $answer;
    private array $choices;

    public function __construct(
        string $question,
        string $answer,
        array $choices
    ) {
        $this->question = $question;
        $this->answer = $answer;
        $this->choices = $choices;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }


}