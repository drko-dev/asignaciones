<?php

namespace Asignaciones\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * testRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class avisosRepository extends EntityRepository
{
	public function avisosLista()
	{
		return $this->getEntityManager()
			 		->createQuery(
			 			'SELECT a, u FROM UsuarioBundle:Avisos a
			 			 JOIN a.username u'
						)
					->getResult();	
	}
	
	public function avisosListaUsuario($id)
	{
		return $this->getEntityManager()
			 		->createQuery(
			 			'SELECT a FROM UsuarioBundle:Avisos a
						JOIN a.username u
						WHERE u.id = :id'
						)
					->setParameter('id', $id)
					->getResult();		
	}
}
