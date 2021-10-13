<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\ClassicalMusicComposer;
use App\Repository\ClassicalMusicComposerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController extends AbstractController
{
    /**
     * @Route("/learn", name="learn")
     */
    public function learn(ClassicalMusicComposerRepository $classicalMusicComposerRepository): Response
    {
        $composers = $classicalMusicComposerRepository->findAll();

        return $this->render('learn.html.twig', ['composers' => $composers]);
    }

    /**
     * @Route("/learn/{slug}", name="learn_composer")
     */
    public function learnComposer(ClassicalMusicComposer $composer): Response
    {
        return $this->render('learn_composer.html.twig', ['composer' => $composer]);
    }
}