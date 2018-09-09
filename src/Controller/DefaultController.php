<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController
{

	/**
	 * @Route("/")
	 */

	public function homePage()
	{
		return new Response('Home Page');
	}
}