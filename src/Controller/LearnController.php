<?php

declare(strict_types=1);

namespace App\Controller;

use App\Provider\ClassicalMusicComposerProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController extends AbstractController
{
    /**
     * @Route("/learn", name="learn")
     */
    public function learn(ClassicalMusicComposerProvider $classicalMusicComposerProvider): Response
    {
        $composers = $classicalMusicComposerProvider->all();

        return $this->render('learn.html.twig', ['composers' => $composers]);
    }
}