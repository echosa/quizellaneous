<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Entity\ClassicalMusicComposer;
use App\Repository\CategoryRepository;
use App\Repository\ClassicalMusicComposerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController extends AbstractController
{
    /**
     * @Route("/learn", name="learn")
     */
    public function learn(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('learn.html.twig', ['categories' => $categories]);
    }

    /**
     * @Route("/learn/category/{slug}", name="learn_category")
     */
    public function learnCategory(Category $category, ClassicalMusicComposerRepository $classicalMusicComposerRepository): Response
    {
        if ($category->getSlug() === 'classical-music') {
            $subjects = $classicalMusicComposerRepository->findAll();
        } else {
            throw $this->createNotFoundException();
        }

        return $this->render('learn_category.html.twig', ['category' => $category, 'subjects' => $subjects]);
    }

    /**
     * @Route("/learn/{slug}", name="learn_composer")
     */
    public function learnComposer(ClassicalMusicComposer $composer): Response
    {
        return $this->render('learn_composer.html.twig', ['composer' => $composer]);
    }
}