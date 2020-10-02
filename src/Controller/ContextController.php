<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContextController extends AbstractController
{
    /**
     * @Route("/elysion/index", name="accueil")
     */
    public function index()
    {
        return $this->render('context/index.html.twig');
    }


}
