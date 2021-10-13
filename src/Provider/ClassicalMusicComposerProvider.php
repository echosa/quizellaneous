<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\ClassicalMusicComposer;
use DateTime;

class ClassicalMusicComposerProvider
{
    public function all(): array
    {
        return [
            new ClassicalMusicComposer('Johann Sebastian Bach', new DateTime('1685-03-31'), new DateTime('1750-07-28')),
            new ClassicalMusicComposer('Wolfgang Amadeus Mozart', new DateTime('1756-01-27'), new DateTime('1791-12-05')),
        ];
    }
}