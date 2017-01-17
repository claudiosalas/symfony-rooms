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
            'number' => $number,
        ));
    }
}

