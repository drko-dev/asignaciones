<?php

namespace Asignaciones\UsuarioBundle\Servicios;

use Asignaciones\UsuarioBundle\Entity\Usuario;
use Doctrine\Common\Persistence\ObjectManager;

class ManejadorUsuario
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function guardar(Usuario $usuario)
    {
        $this->em->persist($usuario);
        $this->em->flush();
    }
}