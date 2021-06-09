
<?php
session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Cita.php';



$entityManager=getEntityManager();

$usuario= $entityManager->getRepository('Usuario')->findOneBy(array('correo' => $_SESSION['usuario']));

$citas = $entityManager->getRepository('Cita')->findBy(array('idUsuario' => $usuario));


$arrayCitas= json_encode($citas);

?>