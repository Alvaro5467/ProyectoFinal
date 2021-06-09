<?php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="usuario")
*
*/
class Usuario implements JsonSerializable
{

/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;

/** @ORM\Column(type="string") **/
    private $nombre;

/** @ORM\Column(type="string") **/
    private $apellidos;


/** @ORM\Column(type="string") **/
    private $correo;

    
/** @ORM\Column(type="string") **/
    private $password;


    /** @ORM\Column(type="string") **/
    private $curso;


    /** @ORM\Column(type="string") **/
    private $asignatura;


    function __construct($nombre, $apellidos,$correo,$password,$curso,$asignatura)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->password=$password;
        $this->curso=$curso;
        $this->asignatura=$asignatura;
      
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return self
     */
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return self
     */
    public function setCorreo($correo): self
    {
        $this->correo = $correo;

        return $this;
    }

     /**
     * Get the value of nombre
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */
    public function setCurso($curso): self
    {
        $this->curso = $curso;

        return $this;
    }




    /**
     * Get the value of nombre
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */
    public function setAsignatura($asignatura): self
    {
        $this->asignatura = $asignatura;

        return $this;
    }





    /**
     * Get the value of nombre
     */
    public function getContra()
    {
        return $this->password;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */
    public function setContra($password): self
    {
        $this->password = $password;

        return $this;
    }




    public function jsonSerialize(){

        return ["id"=>$this->getId(),"nombre"=>$this->getNombre(),"correo"=>$this->getCorreo(),"apellidos"=>$this->getApellidos(),"asignatura"=>$this->getAsignatura(),"curso"=>$this->getCurso()];

    }


}
