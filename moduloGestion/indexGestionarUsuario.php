<?php
 //$boton = $_POST['bntOk'];
 if(isset($_POST['bntOk'])){
     session_start();
     $_SESSION['login'];
     include_once("formGestionarUsuarios.php");
     $objEmitirU = new formGestionarUsuarios;
     $objEmitirU -> formGestionarUsuariosShow();
}
else{
     include_once("../shared/formMensajeSistema.php");
     $objMensaje = new formMensajeSistema;
     $objMensaje -> formMensajeSistemaShow("Usuario no encontrado","<a href='../index.php'>Ir al Inicio</a>");
}
 ?>