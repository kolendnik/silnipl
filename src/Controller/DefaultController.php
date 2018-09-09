<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{

	/**
	 * @Route("/")
	 */

	public function homePage()
	{
		return $this->render('base.html.twig',[
			'title'=>'title1'
		]);
	}
}