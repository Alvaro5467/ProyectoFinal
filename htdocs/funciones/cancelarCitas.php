<?php
session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Cita.php';

$idCita=$_POST['boton'];
$codigo=$_POST['codigo'];

$entityManager=getEntityManager();

$cita= $entityManager->getRepository('Cita')->findOneBy(array('id' => $idCita));



if($cita!=null){

    if($cita->getClave()==$codigo){

        $entityManager->remove($cita);
        $entityManager->flush();

        echo'<script type="text/javascript">
        alert("Cita Eliminada con éxito");
        window.location = "/userCitas";
        </script>';

    }else{

        echo'<script type="text/javascript">
        alert("Error, código erroneo");
        window.location = "/cancelarCita";
        </script>';

 
}
    
    
}else{

    echo'<script type="text/javascript">
    alert("No encontrado, intentar de nuevo");
    window.location = "/cancelarCita";
    </script>';
    
}

