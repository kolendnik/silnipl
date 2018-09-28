<?php

namespace App\Controller;

use App\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(Request $request,UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $user = $this->getUser();
        $form = $this->createForm(AccountType::class,$user);
        $data = $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            //$data = $request->getContent();


            $newPassword = $userPasswordEncoder->encodePassword($user,$request->request->get('password'));
            $user->setPassword($newPassword);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('account/index.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
