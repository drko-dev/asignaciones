<?php

namespace Asignaciones\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Asignaciones\UsuarioBundle\Entity\Usuario;
use Asignaciones\UsuarioBundle\Entity\Avisos;
use Asignaciones\UsuarioBundle\Form\UsuarioType;
use Asignaciones\UsuarioBundle\Form\AvisosType;

class DefaultController extends Controller
{
    public function usuarioAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
        $usuarios = $em->getRepository('UsuarioBundle:Usuario')->listaUsuarios();
    	//var_dump(array_keys(array_keys($usuarios)));
        // die();

        return $this->render('UsuarioBundle:Default:index.html.twig', array('usuarios' => $usuarios));
    }

    public function agregarAction()
    {
    	$usuario = new Usuario();
    	$formulario = $this->createForm(new Usuariotype(), $usuario);
        $peticion = $this->getRequest();

    	if ('POST' === $peticion->getMethod()) {
    		$formulario->bind($peticion);

            $encoder = $this->get('security.encoder_factory')
            ->getEncoder($usuario);
            $usuario->setSalt(md5(time()));
            $passwordCodificado = $encoder->encodePassword(
            $usuario->getPassword(),
            $usuario->getSalt());
            $usuario->setPassword($passwordCodificado);

			$this->get('manejadorusuario')->guardar($usuario);
   //          $em = $this->getDoctrine()->getEntityManager();
			// $em->persist($usuario);
			// $em->flush();
			
            return $this->redirect($this->generateUrl('usuario_lista'));
    	}
    	return $this->render('UsuarioBundle:Default:agregar_usuario.html.twig', array('formulario' => $formulario->createView()));
    }

    public function actualizarAction($id)
    {	
    	$em = $this->getDoctrine()->getEntityManager();
    	$usuario = $em->getRepository('UsuarioBundle:Usuario')->find($id);
   		$formulario = $this->createForm(new Usuariotype(), $usuario);
        $peticion = $this->getRequest();

	    if ('POST' === $peticion->getMethod()) 
	    {
    		$formulario->bind($peticion);          

            $encoder = $this->get('security.encoder_factory')
            ->getEncoder($usuario);
            $usuario->setSalt(md5(time()));
            $passwordCodificado = $encoder->encodePassword(
            $usuario->getPassword(),
            $usuario->getSalt());
            $usuario->setPassword($passwordCodificado);

			$em->flush();
			return $this->redirect($this->generateUrl('usuario_lista'));
		}
    	return $this->render('UsuarioBundle:Default:actualizar_usuario.html.twig', array('usuario' => $usuario, 'formulario' => $formulario->createView()));
    }

    public function eliminarAction($id)
    {	
    	$em = $this->getDoctrine()->getEntityManager();
    	$usuario = $em->getRepository('UsuarioBundle:Usuario')->find($id);

	    if ($usuario !== null) 
	    {
			$em = $this->getDoctrine()->getEntityManager();
			$em->remove($usuario);
			$em->flush();
		}

        return $this->redirect($this->generateUrl('usuario_lista'));
    }

    // AVISOS

    public function avisosAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $avisos = $em->getRepository('UsuarioBundle:Avisos')->avisosLista();

        return $this->render('UsuarioBundle:Default:avisos.html.twig', array('avisos' => $avisos));
    }

    public function avisosVerUsuarioAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $avisos = $em->getRepository('UsuarioBundle:Avisos')->avisosListaUsuario($id);

        return $this->render('UsuarioBundle:Default:lista_avisos_usuario.html.twig', array('id' => $id, 'avisos' => $avisos));
    } 

    public function avisoAgregarAction($id)
    {
        $aviso = new Avisos();
        $formulario = $this->createForm(new Avisostype(), $aviso);
        $peticion = $this->getRequest();

        //$id = $peticion->attributes->get('id');

        if ('POST' === $peticion->getMethod()) {
            $formulario->bind($peticion);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($aviso);
            $em->flush();
            return $this->redirect($this->generateUrl('ver_avisos_usuario', array('id' => $id)));
        }
        return $this->render('UsuarioBundle:Default:agregar_aviso.html.twig', array('id_usuario' => $id, 'formulario' => $formulario->createView()));
    }

    public function avisoActualizarAction($usuario_id, $aviso_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->find($usuario_id);
        $aviso = $em->getRepository('UsuarioBundle:Avisos')->find($aviso_id);
        $formulario = $this->createForm(new Avisostype(), $aviso);
        $peticion = $this->getRequest();

        if ('POST' === $peticion->getMethod()) 
        {
            $formulario->bind($peticion);          
            $em = $this->getDoctrine()->getEntityManager();
            $em->flush();
            return $this->redirect($this->generateUrl('usuario_lista'));
        }
        return $this->render('UsuarioBundle:Default:actualizar_aviso.html.twig', array('aviso' => $aviso,'usuario' => $usuario, 'formulario' => $formulario->createView()));
    }

    public function avisoEliminarAction($aviso_id)
    {   
        $em = $this->getDoctrine()->getEntityManager();
        $aviso = $em->getRepository('UsuarioBundle:Avisos')->find($aviso_id);
        $peticion = $this->getRequest();
        if ($aviso !== null) 
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($aviso);
            $em->flush();
        }

        return $this->redirect($this->generateUrl($peticion->server->get('HTTP_REFERER')));
    }



    public function adminAction() {
        return $this->render('UsuarioBundle:Default:admin.html.twig');
    }

    public function inicioAction() {
        return $this->render('UsuarioBundle:Default:inicio.html.twig');

    }
}