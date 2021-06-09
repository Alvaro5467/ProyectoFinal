<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>IES La Vereda</title>
        <!-- Favicon-->
       
        <!-- Core theme CSS (includes Bootstrap)-->
     
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="funciones.js"></script>
    </head>
    <body>
         <!-- Navigation -->
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IES La Vereda</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="citas">Listado Citas</a>
                    </li>
                    <li>
                        <a href="calendario">Calendario</a>
                    </li>
                    <li>
                        <a href="horario">Horario</a>
                    </li>
                </ul>
                <span class="navbar-text">
     <?php
     echo $_SESSION['usuario'];
     ?>
    </span>
    <ul class="nav navbar-nav">
                    <li>
                        <a href="../funciones/cerrarSesion.php">Cerrar Sesion</a>
                    </li>
            </div>
          
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>
        <!-- Page content-->
        <div class="container">
     
        <br>
        <br>
      <br>
                <h1>Horario</h1>
             
              <h2>Tu horario es el siguiente</h2>
              <br>
              <?php
                require '../funciones/inicializarHorario.php';
              ?>
            
        
            <a href="/generarHorario" >Generar Un nuevo Horario para citas</a>
            </div>
          
     



        
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>