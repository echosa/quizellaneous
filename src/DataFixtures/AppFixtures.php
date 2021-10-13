<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\ClassicalMusicComposer;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $classical = new Category();
        $classical->setName('Classical Music');
        $classical->setSlug('classical-music');
        $manager->persist($classical);

        $manager->flush();

        $bach = new ClassicalMusicComposer();
        $bach->setName('Johann Sebastian Bach');
        $bach->setBirthDate(new DateTime('1685-03-31'));
        $bach->setDeathDate(new DateTime('1750-07-28'));
        $bach->setSlug('johann-sebastian-bach');
        $bach->setCategory($classical);
        $manager->persist($bach);

        $mozart = new ClassicalMusicComposer();
        $mozart->setName('Wolfgang Amadeus Mozart');
        $mozart->setBirthDate(new DateTime('1756-01-27'));
        $mozart->setDeathDate(new DateTime('1791-12-05'));
        $mozart->setSlug('wolfgang-amadeus-mozart');
        $mozart->setCategory($classical);
        $manager->persist($mozart);

        $manager->flush();
    }
}
