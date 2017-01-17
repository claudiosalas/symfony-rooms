<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/", defaults={"max": "100"}, name="home")
     * @Route("/random/number/{max}", defaults={"max" : "100"}, name="random_number")
     */
    public function indexAction($max)
    {
        $number = mt_rand(0, $max);
        $_format = "html";
        return $this->render('lucky/number.'.$_format.'.twig', array(
            'number' => $this->createNewProduct($number),
        ));
    }

    public function createNewProduct($number = 0)
    {
        $product = new Product();
        $product->setName('Product - '.$number);
        $product->setPrice($number + 0.99);
        $product->setDescription('A description about the Product - '.$number);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($product);
        $entityManager->flush();

        return $product->getId();
    }
}

