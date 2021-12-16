<?php
if(isset($_POST['btnEnviar'])){
    $login = trim(strtolower($_POST['login']));
    $password = trim($_POST['password']);
    $resultado_validacion_campos= validarCampos($login,$password);
    if($resultado_validacion_campos==0){
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;
        $objMensaje -> formMensajeSistemaShow("Los datos ingresados no son válidos para cotejo","<a href='../index.php'>Intente nuevamente</a>");
    }else{
        include_once("controllerAutenticarUsuario.php");
        $objController = new controllerAutenticarUsuario;
        $objController -> ValidarUsuario($login,$password);
    }
}
function ComprobarCampo($login){
    if(strlen($login)>3  ){
        return (1);
    }
    else{
        return (0);
    }
}
function validarCampos($login,$password){
    if(strlen($login)>3 and strlen($password)>3){
        return (1);
    }
    else{
        return (0);
    }
}
?>