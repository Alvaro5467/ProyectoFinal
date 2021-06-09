
<?php
session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Cita.php';
require '../../src/Entity/Horario.php';
require_once '../plantillas/plant_cancelar.php';

$entityManager=getEntityManager();

$citas = $entityManager->getRepository('Cita')->findBy(array('correo' => $_POST['email']));

if(!$citas){

    echo "<b>No se han encontrado citas con ese correo, revise si la dirección ha sido bien escrita o si ha reservado alguna cita<b>";
    
}else{

echo "<table class='table'>";
echo "<th>Fecha</th>";
echo "<th>Hora</th>";
echo "<th>Codigo de cancelación</th>";
    for ($i=0; $i <sizeof($citas) ; $i++) { 

        echo"<tr>";
        echo "<form action='/verificandoCancelacion' method='post'>";
        echo "<td>".$citas[$i]->getFecha()->format("d/m/y")."</td>";
        echo "<td>".$citas[$i]->getFecha()->format("H:i")."</td>";
        echo "<td> <input required name='codigo'></td>";;   
        echo "<td><button type='submit' class='btn btn btn-danger' name='boton' value=".$citas[$i]->getId().">Cancelar Cita</button></td>";
        echo "</form>";
        echo "</tr>";

     }

     echo "</table>";

}



?>