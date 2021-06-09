<?php
session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';

$dias='';
$fhInicio=new DateTime($_POST['fh_inicio']);
$fhFinal=new DateTime($_POST['fh_final']);
$Hinicio=$_POST['hora_inicio'];
$Hfinal=$_POST['hora_final'];
$listadoDias=$_POST['check_list'];
$duracion=$_POST['duracion'];
$usuario=$_SESSION['usuario'];

$a=strtotime($fhInicio->format("d/m/y"));
$b=strtotime($fhFinal->format("d/m/y"));


if($Hinicio<$Hfinal && $a<$b && $listadoDias!=""){


for ($i=0; $i <sizeof($listadoDias) ; $i++) { 
    $dias.=$listadoDias[$i].';';
    
}

$dias=substr($dias,0,-1);


$horaInicio=explode(":",$Hinicio);
$horafinal=explode(":",$Hfinal);

$fhInicio->setTime($horaInicio[0],$horaInicio[1]);
$fhFinal->setTime($horafinal[0],$horafinal[1]);



$entityManager=getEntityManager();

$usuario= $entityManager->getRepository('Usuario')->findOneBy(array('correo' => $usuario));
$horario = $entityManager->getRepository('Horario')->findOneBy(array('idUsuario' => $usuario->getId()));




if($horario){

    $horario->setFechaInicio($fhInicio);
    $horario->setFechaFinal($fhFinal);
    $horario->setDuracion($duracion);
    $horario->setDias($dias);
  


}else{
    $horario=new Horario($usuario,$fhInicio,$fhFinal,$duracion,$dias);
    $entityManager->persist($horario);
}

$entityManager->flush();

header('Location:  /citas');

}else{
    echo'<script type="text/javascript">
    alert("La fecha de inicio no puede ser mayor ni igual que la fecha de fin y tienes que seleccionar almenos un dia");
    window.location = "/generarHorario";
    </script>';
}
?>