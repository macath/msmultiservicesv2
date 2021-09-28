<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    /**
     * @Route("/prestations", name="prestation")
     */
    public function index(): Response
    {
        return $this->render('prestation/index.html.twig');
    }
}
