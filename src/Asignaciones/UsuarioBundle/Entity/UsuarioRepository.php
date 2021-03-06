<?php

namespace Asignaciones\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * testRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class usuarioRepository extends EntityRepository
{
	public function listaUsuarios()
	{
		return $this->getEntityManager()
			 		->createQuery(
			 			'SELECT 
			 				count(a) numeroAvisos,
			 				u.id,
			 				u.nombre,
			 				u.apellido,
			 				u.username,
			 				u.role,
			 				u.fecha_alta,
							u.fecha_actualizacion,
							u.esta_activo,
							u.email
			 			FROM UsuarioBundle:Usuario u
			 			LEFT JOIN u.avisos a
			 			GROUP BY u.id'
			 			)
			 		->getResult();
	}
}
