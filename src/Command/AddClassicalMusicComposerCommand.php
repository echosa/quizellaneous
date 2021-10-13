<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\ClassicalMusicComposer;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddClassicalMusicComposerCommand extends Command
{
    protected static $defaultName = 'app:add-composer';

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Adds a classical music composer to the DB')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /*
        $composer = new ClassicalMusicComposer();
        $composer->setName('Johann Sebastian Bach');
        $composer->setBirthDate(new DateTime('1685-03-31'));
        $composer->setDeathDate(new DateTime('1750-07-28'));
        $composer->setSlug('johann-sebastian-bach');

        $composer = new ClassicalMusicComposer();
        $composer->setName('Wolfgang Amadeus Mozart');
        $composer->setBirthDate(new DateTime('1756-01-27'));
        $composer->setDeathDate(new DateTime('1791-12-05'));
        $composer->setSlug('wolfgang-amadeus-mozart');

        $this->entityManager->persist($composer);
        $this->entityManager->flush();
        */

        return Command::SUCCESS;
    }
}
