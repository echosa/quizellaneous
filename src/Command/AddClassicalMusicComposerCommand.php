<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\ClassicalMusicComposer;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
            ->addOption(
                'fill-with-test-data',
                null,
                InputOption::VALUE_NONE,
                'Fill with default test data'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($input->getOption('fill-with-test-data')) {
            $bach = new ClassicalMusicComposer();
            $bach->setName('Johann Sebastian Bach');
            $bach->setBirthDate(new DateTime('1685-03-31'));
            $bach->setDeathDate(new DateTime('1750-07-28'));
            $bach->setSlug('johann-sebastian-bach');
            $this->entityManager->persist($bach);

            $mozart = new ClassicalMusicComposer();
            $mozart->setName('Wolfgang Amadeus Mozart');
            $mozart->setBirthDate(new DateTime('1756-01-27'));
            $mozart->setDeathDate(new DateTime('1791-12-05'));
            $mozart->setSlug('wolfgang-amadeus-mozart');
            $this->entityManager->persist($mozart);

            $this->entityManager->flush();
            $output->writeln('Added default data');

            return Command::SUCCESS;
        }

        return Command::INVALID;
    }
}
