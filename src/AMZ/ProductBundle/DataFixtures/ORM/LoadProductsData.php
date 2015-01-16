<?php

namespace AMZ\ProductBundle\DataFixtures\ORM;

use AMZ\ProductBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class LoadProductsData extends AbstractFixture implements OrderedFixtureInterface
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
            if ($this->hasReference('amz_category' . $i)) {
                $category = $this->getReference('amz_category' . $i);
            }

            $product = new Product();
            $product->setName($this->faker->name)
                ->setDescription($this->faker->text(200))
                ->setPrice($this->faker->randomFloat(2, 1, 500))
                ->setCategory($category);

            $manager->persist($product);

            $this->addReference('amz_product' . $i, $product);
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
        return 2;
    }
}