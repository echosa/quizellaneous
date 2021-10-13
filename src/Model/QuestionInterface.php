<?php

declare(strict_types=1);

namespace App\Model;

interface QuestionInterface
{
    public function getQuestion(): string;
}