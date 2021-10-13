<?php

declare(strict_types=1);

namespace App\Model;

interface QuestionInterface
{
    public function getQuestion(): string;
    public function getAnswer(): string;
    public function getChoices(): array;
}