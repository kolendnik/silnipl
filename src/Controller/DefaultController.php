<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
	public function homePage()
	{
		return new Response('Home Page');
	}
}