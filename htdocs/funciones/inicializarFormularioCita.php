<?php

session_start();

require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';
require '../../src/Entity/Cita.php';


$entityManager=getEntityManager();

$usuario = $entityManager->getRepository('Usuario')->findOneBy(array('id' => $_SESSION['profesor']));




?>