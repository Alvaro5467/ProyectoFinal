
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IES La Vereda</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="estiloIndex.css">
    <script src="funciones.js"></script>

</head>
<body>


<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <br>
      <img src="icono.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="../funciones/login.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="usuario" id="usuario" placeholder="usuario" required>
      <input type="password" id="password" class="fadeIn third"  name="password" id="password" placeholder="contraseña" required>
      <input type="submit" class="fadeIn fourth" value="Iniciar Sesion">
    </form>


  </div>
</div>
</html>