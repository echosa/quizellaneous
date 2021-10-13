<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

interface PersonInterface
{
    public function getName(): string;
    public function getBirthDate(): DateTime;
    public function getDeathDate(): ?DateTime;
}