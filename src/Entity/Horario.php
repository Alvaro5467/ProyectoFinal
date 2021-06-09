<?php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="horario")
*
*/
class Horario implements JsonSerializable
{

/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;


/** @ORM\Column(type="datetime") **/
    private $fechaInicio;


/** @ORM\Column(type="datetime") **/
    private $fechaFinal;


    /** @ORM\Column(type="integer") **/
    private $duracion;


      /** @ORM\Column(type="string") **/
      private $dias;



    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="idUsuario", referencedColumnName="id")
     **/
        private $idUsuario;


    function __construct($idUsuario,$fechaInicio,$fechaFinal,$duracion,$dias)
    {
        $this->$idUsuario=$idUsuario;
        $this->fechaInicio=$fechaInicio;
        $this->fechaFinal=$fechaFinal;
        $this->duracion=$duracion;
        $this->dias=$dias;
      
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Get the value of id
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    /**
     * Get the value of apellidos
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set the value of apellidos
     *
     * @return self
     */
    public function setFechaInicio($fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

      /**
     * Get the value of apellidos
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set the value of apellidos
     *
     * @return self
     */
    public function setFechaFinal($fechaFinal): self
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }



    
      /**
     * Get the value of duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     *
     * @return self
     */
    public function setDuracion($duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }




        /**
     * Get the value of dias
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set the value of dias
     *
     * @return self
     */
    public function setDias($dias): self
    {
        $this->dias = $dias;

        return $this;
    }





    public function jsonSerialize(){

        return ["id"=>$this->getId(),"fechaInicio"=>$this->getFechaInicio()];


    }


}
