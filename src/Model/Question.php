<?php

declare(strict_types=1);

namespace App\Model;

use Serializable;

class Question implements QuestionInterface, Serializable
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

    public function serialize()
    {
        return serialize(
            [
                $this->question,
                $this->answer,
                json_encode($this->choices),
            ]
        );
    }

    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        list($question, $answer, $choices) = $data;
        $this->question = $question;
        $this->answer = $answer;
        $this->choices = json_decode($choices);
    }
}