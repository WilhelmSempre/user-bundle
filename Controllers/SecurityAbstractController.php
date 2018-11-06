<?php
	
namespace WilhelmSempre\UserBundle\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use WilhelmSempre\UserBundle\Events\AuthenticatedUserEvent;
use WilhelmSempre\UserBundle\Events\LoggedOutUserEvent;
use WilhelmSempre\UserBundle\Model\UserInterface;

/**
 * Class SecurityAbstractController
 * @package WilhelmSempre\UserBundle\Controllers
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class SecurityAbstractController extends Controller
{

    /**
     * @var string
     */
    public $error;

    /**
     * @var string
     */
    public $lastUsername;

    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @param EventDispatcher $eventDispatcher
     * @return Response
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils, EventDispatcherInterface $eventDispatcher): Response
    {
        $this->error = $authenticationUtils->getLastAuthenticationError();
        $this->lastUsername = $authenticationUtils->getLastUsername();

        return new Response(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param EventDispatcherInterface $eventDispatcher
     * @return Response
     */
    public function logoutAction(Request $request, EventDispatcherInterface $eventDispatcher): Response {
        return new Response(Response::HTTP_OK);
    }
}