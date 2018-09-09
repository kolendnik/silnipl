<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BansController
{
	public function showContent()
	{
		return new Response('Lista banów tutaj!');
	}
}