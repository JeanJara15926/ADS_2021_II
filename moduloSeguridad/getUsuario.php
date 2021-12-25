<?php
if(isset($_POST['btnEnviar'])){
    
    $login = trim(strtolower($_POST['login']));
    $password = trim($_POST['password']);
    $validaCampos= validarCampos($login,$password);
    if($validaCampos==0){
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;
        $objMensaje -> formMensajeSistemaShow("Los datos ingresados no son válidos para cotejo","<a href='../index.php'>Intente nuevamente</a>");
    }else{
        include_once("controllerAutenticarUsuario.php");
        $objController = new controllerAutenticarUsuario;
        $objController -> ValidarUsuario($login,$password);
    }
}else if(isset($_POST['retrocede'])){

    session_start();
    include_once("../model/usuarioPrivilegio.php");
    include_once("controllerAutenticarUsuario.php");
    $objController = new controllerAutenticarUsuario;
    $idUsuario= $objController -> ObtenerIDUsuario($_SESSION['login']);

    $objPrivilegio = new usuarioPrivilegio;
    $listaPrivilegios = $objPrivilegio -> obtenerPrivilegiosUsuario($idUsuario);
    $_SESSION['login'] = $_POST['login'];
    include_once("formMenuPrincipal.php");
    $objMenuPrincipal = new formMenuPrincipal;
    $objMenuPrincipal -> formMenuPrincipalShow($listaPrivilegios);

}else if(isset($_POST['btnContrasena'])){

    $ncontra = trim($_POST['ncontra']);
    $acontra = trim($_POST['acontra']);
    $ccontra = trim($_POST['ccontra']);
    $login = $_POST['loginc'];
    $validacion_contras= validarContras($ncontra,$acontra,$ccontra);
    $igual_contras= validarIgualdad($ncontra,$ccontra);
    $dirigir = "<form method='POST' action='indexCambiarPassword.php'>
                        <input type='submit' class='btnTacza' name='bntOk' value='Volver' />
                </form>";
    if($igual_contras==0){
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;        
        $objMensaje -> formMensajeSistemaShow("Los campos no son coinciden",$dirigir);
    }else if($validacion_contras==0){
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;
        $objMensaje -> formMensajeSistemaShow("Los datos ingresados no son válidos para cotejo",$dirigir);
    }else{
        include_once("controllerCambiarContrasena.php");
        $objControllerContra = new controllerCambiarContrasena;
        $objControllerContra -> ValidarControllerContras($ncontra,$acontra,$login);
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

function validarContras($ncontra,$acontra,$ccontra){
    if(strlen($ncontra)>0 and strlen($acontra)>0 and strlen($ccontra)>0){
        return (1);
    }
    else{
        return (0);
    }
}

function validarIgualdad($ncontra,$ccontra){
    if($ncontra == $ccontra){
        return (1);
    }
    else{
        return (0);
    }
}
?>
