<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BansController
{
	/**
	 * @Route("/bans")
	 */
	public function showBansContent()
	{
		return new Response('Lista banów tutaj!');
	}
}