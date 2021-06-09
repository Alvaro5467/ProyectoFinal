<?php
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';

session_start();

$id=$_POST['boton'];

$_SESSION['profesor']=$id;




$entityManager=getEntityManager();

$horario = $entityManager->getRepository('Horario')->findOneBy(array('idUsuario' => $id));


$var1 = $horario->getFechaInicio();
$var2 = $horario->getFechaFinal();
$intervalo = $horario->getDuracion();

echo "<form method='POST' action='consulta/horasDisponibles'>";
echo "<select name='dia'>";

$dias=$horario->getDias();
$dias=explode(";",$dias);



for ($i=$var1; $i <=$var2 ;$i->modify('+1 day')) { 
    for ($j=0; $j <sizeof($dias); $j++) { 
  
        if($i->format("N")==$dias[$j]){
       
        echo "<option value=".$i->format("d/m/y").">".$i->format("d/m/y")."</option>";
       
    }
      }
    }
        echo "</select>";
         echo "&nbsp";
        echo "<button class='btn btn-info'  type='submit'>Filtrar</button>";
        echo "</form>";


      


?>