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
        <link rel="icon" type="image/x-icon" href="icono.png" />
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
        <div class="container " style="margin-top: 1%">
        <!--
       <h1>Crear Un Nuevo Horario</h1>
            <form action="inicializarHorario.php" method="post">
            Fecha Inicio<input type="date" name="fechaInicio"/>
            Fecha Final<input type="date" name="fechaFinal"/>
            <br>
            Intervalo<input type="number" min=30 max=60 name="intervalo"/> minutos
            <p><input type="submit" /></p>
           </form>
        -->

     
 <br> 
 <br>
        <h1>Horario Nuevo</h1>
      <h3>Inserta los datos para generar el horario nuevo</h3>
      <!--FALTA HACER JS PARA CUADRAR LAS HORAS https://stackoverflow.com/questions/16979122/how-to-set-min-value-for-input-type-time-elements-->
      <form action="../funciones/generarHorario.php" method="post">
       <span>Dia de inicio <input type="date" required name="fh_inicio"  min=
     <?php
         echo date('Y-m-d');
     ?>
 ></span> <span>Hora Inicio <input type="time" required name="hora_inicio" min= ></span> <br> 
 <br>
       <span>Dia  Final <input type="date" required name="fh_final" min=
     <?php
         echo date('Y-m-d');
     ?>></span> <span>Hora Final <input type="time" required name="hora_final" min=""></span>
       <br>
       <br>
       <span>Dias de la semana: </span>
       <br>
      <label><input type="checkbox" id="1" value="1"  name="check_list[]"> Lunes  </label><br>
      <label><input type="checkbox" id="2" value="2"  name="check_list[]"> Martes </label><br>
      <label><input type="checkbox" id="3" value="3"  name="check_list[]"> Miercoles </label><br>
      <label><input type="checkbox" id="4" value="4"  name="check_list[]"> Jueves</label><br>
      <label><input type="checkbox" id="5" value="5"  name="check_list[]"> Viernes  </label><br>

      <span>Duracion De la reunion <input type="number" min="1" name="duracion">(minutos)</span>
      <br>
      <input type="submit" value="Generar Horario">

      </form>
    </div>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
