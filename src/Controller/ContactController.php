<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        // $form = $this->createForm(ContactType::class);
        // $form->handleRequest($request);

        // if($form->isSubmitted() && $form->isValid()) {
        //     $this->addFlash('notice', 'Merci de nous avoir contacté. Nous vous répondrons dans les plus brefs délais !');

        //     // Envoi du mail
        // }

        return $this->render('contact/index.html.twig'
        //, ['form' => $form->createView()]
        );
    }
}
