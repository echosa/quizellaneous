<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController
{
    /**
     * @Route("/learn")
     */
    public function learn(): Response
    {
        return new Response('time to learn!');
    }
}