<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TermsController extends AbstractController
{
    /**
     * @Route("/terms", name="app_terms")
     */
    public function index()
    {
        return $this->render('terms/terms.html.twig', [
            'controller_name' => 'TermsController',
        ]);
    }
}
