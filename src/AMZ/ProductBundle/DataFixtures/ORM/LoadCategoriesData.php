<?php

namespace AMZ\ProductBundle\DataFixtures\ORM;

use AMZ\ProductBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class LoadCategoriesData extends AbstractFixture implements OrderedFixtureInterface
{

    private $faker;

    function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Category(new ArrayCollection());
            $category->setName($this->faker->text(10));

            $manager->persist($category);

            $this->addReference('amz_category' . $i, $category);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}