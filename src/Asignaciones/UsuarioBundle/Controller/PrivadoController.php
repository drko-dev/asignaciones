<?php

namespace Asignaciones\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class PrivadoController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
            // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        }else{
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('UsuarioBundle:Privado:login.html.twig', array(
                // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            ));
    }

    public function indexAction()
    {
        //llamo la variable de session 
        $usuario = $this->getUser();
        $id = $usuario->getId();

        $em = $this->getDoctrine()->getEntityManager();
        $avisos = $em->getRepository('UsuarioBundle:Avisos')->avisosListaUsuario($id);

        return $this->render('UsuarioBundle:Privado:index.html.twig', array('usuario' => $usuario, 'avisos' => $avisos));
    }
}