<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BansController extends AbstractController
{
	/**
	 * @Route("/bans")
	 */
	public function showBansContent()
	{
		$bans = [
			'arek1',
			'player2',
			'player3'
		];

		//return new Response('Lista banów tutaj!');
		return $this->render('bans.html.twig',[
			'bans'=>$bans
		]);
	}
}