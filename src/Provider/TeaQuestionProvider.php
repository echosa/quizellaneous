<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\Question;
use App\Repository\TeaRepository;

class TeaQuestionProvider
{
    private TeaRepository $teaRepository;

    public function __construct(
        TeaRepository $teaRepository
    ) {
        $this->teaRepository = $teaRepository;
    }

    public function all(): array
    {
        $questions = [];

        foreach ($this->teaRepository->findAll() as $tea) {
            $questions[] = new Question(
                sprintf('What type of tea is %s?', $tea->getName()),
                $tea->getType(),
                $this->generateTeaTypeChoices()
            );
        }

        return $questions;
    }

    private function generateTeaTypeChoices(): array
    {
        $teaTypes = [
            'black',
            'green',
            'white',
        ];

        shuffle($teaTypes);

        return $teaTypes;
    }
}