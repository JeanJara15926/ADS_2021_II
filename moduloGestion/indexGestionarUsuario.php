<?php

 if(isset($_POST['bntOk'])){
     session_start();
     $_SESSION['login'];
     include_once("formGestionarUsuario.php");

     $objUsuario = new formGestionarUsuario;
     $objUsuario -> formGestionarUsuarioShow();

     //$objEmitirU = new formGestionarUsuario;
     //$objEmitirU -> formGestionarUsuarioShow();
}
else{
     include_once("../shared/formMensajeSistema.php");
     $objMensaje = new formMensajeSistema;
     $objMensaje -> formMensajeSistemaShow("Usuario no encontrado","<a href='../index.php'>Ir al Inicio</a>");
}
 ?>