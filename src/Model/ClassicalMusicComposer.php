<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class ClassicalMusicComposer implements PersonInterface, SlugInterface
{
    private string $name;
    private DateTime $birthDate;
    private ?DateTime $deathDate;

    public function __construct(
        string $name,
        DateTime $birthDate,
        DateTime $deathDate = null
    ) {
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->deathDate = $deathDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function getDeathDate(): ?DateTime
    {
        return $this->deathDate;
    }

    public function getSlug(): string
    {
        return mb_strtolower(str_ireplace(' ', '-', $this->getName()));
    }
}