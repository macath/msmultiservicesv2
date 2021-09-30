<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalConditionsController extends AbstractController
{
    /**
     * @Route("/mentions_légales", name="legal_conditions")
     */
    public function index(): Response
    {
        return $this->render('legal_conditions/index.html.twig');
    }
}
