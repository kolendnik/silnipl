<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TermsController extends AbstractController
{
    /**
     * @Route("/terms", name="terms")
     */
    public function index()
    {
        return $this->render('terms/index.html.twig', [
            'controller_name' => 'TermsController',
        ]);
    }
}
