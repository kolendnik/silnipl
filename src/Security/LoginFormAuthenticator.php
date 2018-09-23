<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use App\Repository\UserRepository;
use Symfony\Component\Routing\RouterInterface;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $userRepository;
    private $router;

    public function __construct(UserRepository $userRepository,RouterInterface $router)
    {
        $this->userRepository = $userRepository;
        $this->router = $router;
    }

    public function supports(Request $request)
    {
        // todo
        //die('BUSAUHSUAHUSHA');
        return $request->attributes->get('_route') === 'app_login' 
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        //dd($request->request->all());
        return [
            'username'=>$request->request->get('username'),
            'password'=>$request->request->get('password')
        ];
        // $credentials = [
        //     'username' => $request->request->get('username'),
        //     'password' => $request->request->get('password'),
        // ];
        // $request->getSession()->set(
        //     Security::LAST_USERNAME,
        //     $credentials['username']
        // );

        // return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // todo
        //dd($credentials);
        return $this->userRepository->findOneBy(['username'=>$credentials['username']]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // todo
        //dd($user);
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // todo
        //dd('success');
        return new RedirectResponse($this->router->generate('homepage'));
    }


    public function supportsRememberMe()
    {
        // todo
    }

    public function getLoginUrl()
    {
        return $this->router->generate('app_login');
    }
}
