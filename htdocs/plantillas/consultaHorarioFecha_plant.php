<?php
require '../funciones/consultaHorarioFecha.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IES La Vereda</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="estiloIndex.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="funciones.js"></script>
</head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-light" role="navigation" style="background-color: #3e8222;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <img src="../../clase.png" style="height:30px; width:30px; ">

                <a class="navbar-brand" href="/userCitas" style="color:white;">IES La Vereda</a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
            </div>
            <a class="navbar" href="/" style="color:white;">Inicio</a>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>
    <div class="container">
    <br>
   
    <h4>Horas Disponibles para el dia <?php echo $_POST['dia'] ?></h4>  
    


<table class="table table-sm table-hover table-bordered">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hora</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>

  <tbody>
  
  <?php
    setcookie('dia',$_POST['dia']);
    session_start();
    $_SESSION['dia']=$_POST['dia'];
    
  $array=array();

  for ($i=0; $i <sizeof($citas) ; $i++) { 
    if($citas[$i]->getFecha()->format('d/m/y')==$_POST['dia']){
        array_push($array,$citas[$i]->getFecha());
    }
  }
 
  asort($array);

  $array2=array();

 foreach ($array as $key => $value) {
    array_push($array2,$value->format("H:i"));
 }

$array3=array();

foreach($rangoHoras as $hora){
    
    if($hora->format("H:i")>=$var1->format("H:i")&&$hora->format("H:i")<=$var2->format("H:i")){
  
        array_push($array3,$hora->format("H:i"));
   
} 
    if($var2->format("H:i")==$hora->format("H:i")||$hora->format("H:i")>$var2->format("H:i") ){
        
    break;
    }

  

}



$resultado = array_diff($array3, $array2);

     foreach($resultado as $hora){
    
        if($hora>=$var1->format("H:i")&&$hora<=$var2->format("H:i")){
        echo "<tr>";
        echo "<th scope='row'></th>";
        echo "<td>".$hora."</td>";
        echo "<form action='/confirmarCita' method='post'>";
        echo "<td> <button class='btn btn-success'  type='submit' class='btn' name='hora' value=".$hora.">Reservar</button></td>";
        echo "</form>";
        echo "</tr>";

    } 
        if($var2->format("H:i")==$hora||$hora>$var2->format("H:i") ){
            
            return false;
        }

      
 
    }
   
    

           ?>


  </tbody>
</table>


        <br>
       <br>
         
        </div>



    </body>
</html>