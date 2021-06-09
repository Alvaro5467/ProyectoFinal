<?php
require "../funciones/inicializarFormularioCita.php";
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
            <img src="../clase.png" style="height:30px; width:30px; ">

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
    <h2>Formulario Cita</h2>
    <hr>
    <div class="form-group">
    <form action="../funciones/aceptarCitas.php" method="post">

    <div class="row">
    <div class="col">
    <b><label>Nombre profesor</label></b> <input type="text" disabled class="form-control"  value="<?php echo $usuario->getNombre().' '.$usuario->getApellidos();  ?>"><br>
    <b><label> Curso</label></b> <br><input type="text" disabled class="form-control"  value="<?php echo $usuario->getCurso(); ?>"><br>
    <b><label >Asignatura</label></b><input type="text" disabled class="form-control"  value="<?php echo $usuario->getAsignatura(); ?>"><br>

    </div>
    <div class="col">
    <b><label >Dia de la reunión:</label></b><input type="text" value="<?php echo $_SESSION['dia'] ?>" readonly="readonly" class="form-control" name="dia"><br>
    <b><label >Hora de la reunión:</label></b><input type="time" value="<?php echo $_POST['hora'] ?>" readonly="readonly" class="form-control" name="horaReunion"><br>
    <b><label >Email :</label> </b><input type="email" required class="form-control"  name="email"><br>
    </div>

   
  
    </div>
    <button  class="btn btn-primary btn-lg" type="submit">Confirmar Cita </button>
    <a  class="btn btn-danger btn-lg" href="listadoCitas"> Cancelar </a>
    </form>
</div>

      
       

<br>
<br>
</body>
</html>