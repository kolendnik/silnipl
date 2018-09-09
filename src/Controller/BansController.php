<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Ban;
use Doctrine\ORM\EntityManagerInterface;

class BansController extends AbstractController
{
	/**
	 * @Route("/bans",name="ban_list")
	 */
	public function showBansContent(EntityManagerInterface $em)
	{
		$repository = $em->getRepository(Ban::class);
		$bans = $repository->findAll();

		if(!$bans)
			throw $this->createNotFoundException(sprintf('No bans'));


		return $this->render('bans.html.twig',[
			'bans'=>$bans
		]);
	}

	/**
	 * @Route("/bans/add/",name="bans_add",methods={"POST"})
	 */
	public function addBan(EntityManagerInterface $em)
	{
		$ban = new Ban();
		$ban->setName('player_'.rand(1,100));
		$ban->setAddedBy('Arek');
		$em->persist($ban);
		$em->flush();
		//$this->bans[] = $name;
		return $this->json(['bans'=>['id'=>$ban->getId(),'name'=>$ban->getName()]]);
	}

}