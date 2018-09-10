<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Ban;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


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
			$bans = null;
		//	throw $this->createNotFoundException(sprintf('No bans'));



		return $this->render('bans.html.twig',[
			'bans'=>$bans
		]);
	}

	/**
	 * @Route("/bans/add/",name="bans_add",methods={"POST"})
	 */
	public function addBan(Request $request ,EntityManagerInterface $em)
	{
		
		$banName = $request->request->get('name');
		
		$ban = new Ban();
		$ban->setName($banName);
		$ban->setAddedBy('Arek');
		$em->persist($ban);
		$em->flush();
		//return $this->json($data);
		return $this->json(['bans'=>['id'=>$ban->getId(),'name'=>$ban->getName()]]);
	}


	public function updateBan(Request $request, EntityManagerInterface $em)
	{
		die('TODO');
	}


	/**
	 * @Route("/bans/delete/{id}",name="delete_ban",methods={"DELETE"})
	 */

	public function deleteBan($id, EntityManagerInterface $em)
	{
		$rep = $em->getRepository(Ban::class);
		$ban = $rep->findOneById($id);
		if(!$ban)
			throw $this->createNotFoundException(sprintf('No ban with id: %s',$id));

		$em->remove($ban);
		$em->flush();

		return $this->json(['msg'=>sprintf('ban with id: %s deleted',$id)]);
	}

	/**
	 * @Route("/bans/add/fake",name="add_bans_fake",methods={"POST"})
	 */

	public function addMultipleFakeBans($quantity = 20,EntityManagerInterface $em)
	{
		for($i=0;$i<$quantity;$i++)
		{
			$ban = new Ban();
			$ban->setName('player_'.rand(1,1000));
			$ban->setAddedBy('Arek');
			$em->persist($ban);
		}
		$em->flush();

		return $this->json(['q'=>$quantity,'msg'=>sprintf('Dodano %s banów',$quantity)]);

	}

}