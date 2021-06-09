<?php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="cita")
*
*/
class Cita implements JsonSerializable
{

/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;

/** @ORM\Column(type="string") **/
    private $correo;

/** @ORM\Column(type="datetime") **/
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="idUsuario", referencedColumnName="id")
     **/
    private $idUsuario;

/** @ORM\Column(type="string") **/
private $clave;

    

    function __construct($correo,$fecha,$idUsuario,$clave)
    {
        $this->correo=$correo;
        $this->fecha = $fecha;
        $this->idUsuario=$idUsuario;
        $this->clave=$clave;
    
      
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of nombre
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */
    public function setCorreo($correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of apellidos
     *
     * @return self
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }



     /**
     * Get the value of apellidos
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of apellidos
     *
     * @return self
     */
    public function setClave($clave): self
    {
        $this->clave = $clave;

        return $this;
    }


    public function jsonSerialize(){

        return ['id'=>$this->getId(),'fecha'=>$this->getFecha(),'correo'=>$this->getCorreo()];


    }


}
