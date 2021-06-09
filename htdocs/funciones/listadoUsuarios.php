<?php

require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';


$entityManager=getEntityManager();

$usuario= $entityManager->getRepository('Usuario')->findAll();

?>

