<?php
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';
require '../../src/Entity/Cita.php';


$entityManager=getEntityManager();

$horario = $entityManager->getRepository('Horario')->findOneBy(array('idUsuario' => $_COOKIE['profesor']));
 
$citas = $entityManager->getRepository('Cita')->findBy(array('idUsuario' => $_COOKIE['profesor']));

$usuario=$entityManager->getRepository('Usuario')->findOneBy(array('id' => $_COOKIE['profesor']));

$var1 = $horario->getFechaInicio();//de la BD horariInicial
$var2 = $horario->getFechaFinal();//de la BD horariFinal
$intervalo = $horario->getDuracion();//post tiene que ser



$rangoHoras = new DatePeriod($var1, new DateInterval('PT'.$intervalo.'M'), $var2);


?>



