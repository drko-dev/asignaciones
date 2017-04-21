<?php

namespace Asignaciones\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avisos
 *
 * @ORM\Table(name="avisos")
 * @ORM\Entity(repositoryClass="Asignaciones\UsuarioBundle\Entity\AvisosRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Avisos
{

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="avisos")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $username;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fecha_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="datetime")
     */
    private $fecha_actualizacion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Avisos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Avisos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Avisos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fecha_creacion
     *
     * @param \DateTime $fechaCreacion
     * @return Avisos
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fecha_creacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fecha_creacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set fecha_actualizacion
     *
     * @param \DateTime $fechaActualizacion
     * @return Avisos
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fecha_actualizacion = $fechaActualizacion;
    
        return $this;
    }

    /**
     * Get fecha_actualizacion
     *
     * @return \DateTime 
     */
    public function getFechaActualizacion()
    {
        return $this->fecha_actualizacion;
    }

    /**
     * Set username
     *
     * @param \Asignaciones\UsuarioBundle\Entity\Usuario $username
     * @return Avisos
     */
    public function setUsername(\Asignaciones\UsuarioBundle\Entity\Usuario $username = null)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return \Asignaciones\UsuarioBundle\Entity\Usuario 
     */
    public function getUsername()
    {
        return $this->username;
    }

        /**
    * @ORM\PrePersist
    */
    public function setFechaCreacionValor()
    {
        $this->fecha_creacion = new \DateTime();
    }

    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function setFechaActualizacionValor()
    {
        $this->fecha_actualizacion = new \DateTime();
    }
}