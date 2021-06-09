<?php
session_start();
require '../../bootstrap.php';
require '../../src/Entity/Usuario.php';
require '../../src/Entity/Horario.php';
require '../../src/Entity/Cita.php';
require '../../vendor/PHPMailer/PHPMailerAutoload.php';

$caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$longitud = 12;
$clave=substr(str_shuffle($caracteres_permitidos), 0, $longitud);

$entityManager=getEntityManager();

$dia= $_POST['dia'];
$hora= $_POST['horaReunion'];
$horaMail= $_POST['horaReunion'];
$email=$_POST['email'];
$dateNew = DateTime::createFromFormat('d/m/y', $dia);

$hora=explode(":",$hora);

$dateNew->setTime($hora[0], $hora[1]);

$usuario = $entityManager->getRepository('Usuario')->findOneBy(array('id' => $_SESSION['profesor']));

$cita=new Cita($_POST['email'],$dateNew,$usuario,$clave);

if($cita){

$entityManager->persist($cita);
$entityManager->flush();



$mail = new PHPMailer();
$mail->IsSMTP();
 
$mail->From ="ieslavereda2@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
//"smtp.office365.com"
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='ieslavereda2@gmail.com'; //nombre usuario
$mail->Password ='Patata546'; //contraseña


$mail->FromName = 'IES La Vereda'; 


//Agregar destinatario
$mail->AddAddress($email);
$mail->Subject = 'Cita';
$mail->Body ='Se ha reservado exitosamente su cita a la hora '.$horaMail.' , si quiere cancelar esta cita utilize este codigo de cancelacion en el apartado cancelar citas '.$clave. ' .Recuerde que esta clave es personal y no debe compartirla con nadie.';
 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Se ha enviado un correo con su cita");
           window.location = "/userCitas";
        </script>';
       
} else {
    echo'<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
           window.location = "/userCitas";
        </script>';
}





}





?>