<?php

//session_start();

require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';

$entityManager=getEntityManager();

$usuario= $entityManager->getRepository('Usuario')->findOneBy(array('correo' => $_SESSION['usuario']));
$horario = $entityManager->getRepository('Horario')->findOneBy(array('idUsuario' => $usuario->getId()));


//sacar horas

//echo $postHorarioInicio.$postHorarioFinal;

$var1 = $horario->getFechaInicio();//de la BD horariInicial
$var2 = $horario->getFechaFinal();//de la BD horariFinal
$intervalo = $horario->getDuracion();//post tiene que ser


//$horaInicio = new DateTime($var1);

//date_add($horaInicio, date_interval_create_from_date_string($i.' days'));

//$horafin = new DateTime($var2);

//date_add($horafin, date_interval_create_from_date_string($i.' days'));

//$postHorarioFinal = $postHorarioFinal->modify( '+'.$intervarlo.' minutes' ); 

$rangoHoras = new DatePeriod($var1, new DateInterval('PT'.$intervalo.'M'), $var2);

/*
echo "<select>
<option value='0'>Seleccione su hora:</option>";
foreach($rangoFechas as $fecha){

  echo '<option value="'.$fecha->format("H:i:s").'">'.$fecha->format("H:i:s").'</option>';
   
 
}

echo "</select>";


*/



$dias=$horario->getDias();
$dias=explode(";",$dias);

echo '<h3>'.$var1->format('d/m/y').'&nbspa '. $var2->format('d/m/y').'</h3>';
echo '<br>';

for ($i=0; $i <sizeof($dias) ; $i++) { 

  switch ($dias[$i]) {
    case 1:
        echo "<h4>Lunes</h4> &nbsp";
        break;
    case 2:
        echo "<h4>Martes</h4> &nbsp";
        break;
    case 3:
        echo "<h4>Miercoles</h4> &nbsp";
        break;

    case 4:
        echo "<h4>Jueves</h4> &nbsp";
        break;

    case 5:
        echo "<h4>Viernes</h4> &nbsp";
        break;
  }


}

echo '<h4>'.$var1->format('H:i').'&nbspa '. $var2->format('H:i').'</h4>';



  




?>