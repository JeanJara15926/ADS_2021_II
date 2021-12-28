<?php

 if(isset($_POST['bntOk'])){
     session_start();
     $_SESSION['login'];
     include_once("formGestionarProducto.php");
     $objEmitirP = new formGestionarProducto;
     $objEmitirP -> formGestionarProductoShow();
 }
 else{
     include_once("../shared/formMensajeSistema.php");
     $objMensaje = new formMensajeSistema;
     $objMensaje -> formMensajeSistemaShow("Acceso no permitido","<a href='../index.php'>Ir al inicio</a>");
 }
 ?>