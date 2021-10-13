<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\Question;

class ClassicalMusicComposerQuestionProvider
{
    public function all(): array
    {
        return [
            new Question('What year was Mozart born?'),
        ];
    }
}