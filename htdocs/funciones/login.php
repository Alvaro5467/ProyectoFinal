<?php

if(($_POST['usuario']!== null) && ($_POST['password']!==null)){

session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';


$usuarioLogin=$_POST['usuario'];
$claveLogin=$_POST['password'];


$entityManager=getEntityManager();
$usuario =$entityManager->getRepository('Usuario')->findOneBy(array('correo' => $usuarioLogin));
if($usuario){


if(password_verify($claveLogin,$usuario->getContra())){

    $_SESSION['usuario']=$usuarioLogin;


    header('Location: /citas');

}else{
   
    echo'<script type="text/javascript">
    alert("Contraseña Incorrecta");
    window.location = "/login";
    </script>';


}

}else{

   
    echo'<script type="text/javascript">
    alert("Usuario Incorrecto");
    window.location = "/login";
    </script>';





}




}

?>