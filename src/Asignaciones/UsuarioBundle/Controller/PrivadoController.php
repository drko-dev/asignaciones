<?php

namespace Asignaciones\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Asignaciones\UsuarioBundle\Entity\Avisos;
use Asignaciones\UsuarioBundle\Form\AvisosType;

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
        
        //$usuario = $this->get('security.context')->getToken()->getUser();
        $usuario = $this->getUser();
        // return $this->render('UsuarioBundle:Privado:test.html.twig');
        $id = $usuario->getId();

        $em = $this->getDoctrine()->getEntityManager();
        $avisos = $em->getRepository('UsuarioBundle:Avisos')->avisosListaUsuario($id);

        return $this->render('UsuarioBundle:Privado:index.html.twig', array('usuario' => $usuario, 'avisos' => $avisos));
    }

    public function avisoAgregarAction()
    {
        // return $this->render('UsuarioBundle:Privado:test.html.twig');

        $usuario = $this->getUser();
        
        $id = $usuario->getId();

        $aviso = new Avisos();
        $formulario = $this->createForm(new Avisostype(), $aviso);
        $peticion = $this->getRequest();

        
        if ('POST' === $peticion->getMethod()) {
            $formulario->bind($peticion);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($aviso);
            $em->flush();
            return $this->redirect($this->generateUrl('ver_avisos_usuario', array('id' => $id)));
        }
        return $this->render('UsuarioBundle:Privado:aviso_agregar.html.twig', array('id_usuario' => $id, 'formulario' => $formulario->createView()));
    }
}