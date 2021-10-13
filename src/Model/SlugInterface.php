<?php

declare(strict_types=1);

namespace App\Model;

interface SlugInterface
{
    public function getSlug(): string;
}