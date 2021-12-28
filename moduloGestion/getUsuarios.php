<?php
    function validacionCampos($nombre,$dni,$user,$contra){
        if($nombre!="" and strlen($dni)==8 and $user!="" and strlen($contra)>3){
            return 1;
        }else {
            return 0;
        }
    }
    if(isset($_POST['ExtraerUsuarios'])){
        include_once("controllerGestionarUsuario.php");
        $objController = new controllerGestionarUsuario;
        $objController -> ExtraerUsuarios();
    }
    else if(isset($_POST['dniRegistro'])){
        $nombre = trim($_POST['nombre']);
        $dni = trim($_POST['dniRegistro']);
        $rol = trim($_POST['rol']);
        $user = trim($_POST['user']);
        $contra = trim($_POST['contra']);
        $validacion = validacionCampos($nombre,$dni,$user,$contra);
        if($validacion==0){
            echo "Hay valores NO Validos";
        }else{
            include_once("controllerGestionarUsuario.php");
            $objController = new controllerGestionarUsuario;
            $objController->insertarUsuarios($nombre,$dni,$rol,$user,$contra);
        }
    }
    else if (isset($_POST['buscar'])){
        $buscar = trim($_POST['buscar']);
        include_once("controllerGestionarUsuario.php");
        $objController = new controllerGestionarUsuario;
        $objController->BuscarUsuarioLogin($buscar);
    }
    else if (isset($_POST['idEliminar'])){
        $idEliminar = $_POST['idEliminar'];
        include_once("controllerGestionarUsuario.php");
        $objController = new controllerGestionarUsuario;
        $objController->EliminarUsuario($idEliminar);
    }
    else if(isset($_POST['idEditar'])){
        $idEditar = $_POST['idEditar'];
        include_once("controllerGestionarUsuario.php");
        $objController = new controllerGestionarUsuario;
        $objController->BuscarUsuarioEdit($idEditar);        
    }
    else if(isset($_POST['idGuardarUsuarioM'])){                     
        $idGuardarUsuarioM = trim($_POST['idGuardarUsuarioM']);          
        $nombre = trim($_POST['nombreM']);
        $dni = trim($_POST['dniModificar']);
        $rol = trim($_POST['rolM']);
        $user = trim($_POST['userM']);
        $contra = trim($_POST['contraM']);

        $validacion2 = validacionCampos($nombre,$dni,$user,$contra);
        if($validacion2==0){
            echo "Hay valores NO Validos";
        }else{
            include_once("controllerGestionarUsuario.php");
            $objController = new controllerGestionarUsuario;
            $objController->UpdateUsuarios($idGuardarUsuarioM,$nombre,$dni,$rol,$user,$contra); 
        }
    }
    else{
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;
        $objMensaje -> formMensajeSistemaShow("Se ha detectado un acceso no permitido","<a href='../index.php'>Ingrese adecuadamente</a>");
  
    }
    
?>



    

        









        
    