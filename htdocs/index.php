<?php

session_start();

require_once '../bootstrap.php';

$uri = basename($_SERVER['REQUEST_URI']);

if ($uri == '') {

    require "plantillas/plant_index.php";

} else if ($uri == "login") { 

   require "plantillas/plant_login.php";

} else if ($uri == "") { 
    
    //require "inicioAdmin.php";


} else if ($uri == "") { 

    //require "inicioUsuario.php";
 
 } else if ($uri == "") { 
     
     //require "inicioAdmin.php";
 
  


} else {
    header('Status:404 Not Found');
    echo '<html><body>Página No Encontrada</body></html>';
}
