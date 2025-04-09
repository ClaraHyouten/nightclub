<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Party;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        foreach (range(1, 10) as $i) {
            $party = new Party();
            $party->setName('Party ' . $i);
            $party->setDescription('Description of Party ' . $i);
            $party->setDateParty(new \DateTime('2023-10-' . str_pad($i, 2, '0', STR_PAD_LEFT)));
            $party->setCreateAt(new \DateTimeImmutable());
            
            $manager->persist($party);
        }
                
        $manager->flush();
    }
}