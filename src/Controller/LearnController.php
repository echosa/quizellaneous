<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ClassicalMusicComposer;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController extends AbstractController
{
    /**
     * @Route("/learn", name="learn")
     */
    public function learn(): Response
    {
        $composers = [
            new ClassicalMusicComposer('Johann Sebastian Bach', new DateTime('1685-03-31'), new DateTime('1750-07-28')),
            new ClassicalMusicComposer('Wolfgang Amadeus Mozart', new DateTime('1756-01-27'), new DateTime('1791-12-05')),
        ];

        return $this->render('learn.html.twig', ['composers' => $composers]);
    }
}