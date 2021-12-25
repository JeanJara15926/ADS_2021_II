<?php

    function validarCampos($idUsuario,$nombre,$dni,$rol,$login,$password,$estado){
        if($idUsuario>0 and strlen($nombre)>2 and $dni>7 and strlen($rol)>2 and strlen($login)>3 and strlen($password)>3 and $estado>0){
            return (1);
        }
        else{
            return (0);
        }
    }
        if(isset($_POST['N_Nombre'])){        
            $nombre = $_POST['N_Nombre'];
            $dni = $_POST['DNI_U'];
            $rol = $_POST['Rol_U'];
            $login = $_POST['Login_U'];
            $password = $_POST['Password_U'];
            $estado = $_POST['Estado_U'];
        
        $resulValidarCampos = ValidarCampos($idUsuario, $nombre,$dni,$rol,$login,$password,$estado);
        if($resulValidarCampos == 0){            
            echo "Los datos ingresados NO son validos";
        }else {   
            include_once("controllerGestionarUsuario.php");
            $objController = new controllerGestionarUsuario();

            //if(isset($_FILES['ImagenP'])){
              //  $imagen=$_FILES['ImagenP'];
                //$valiImagen=validarImagen($imagen);
                
                //if($valiImagen==0){
                  //  echo "El formato de la imagen no es valido";
                //}else{
                    $objController->insertarUsuario($idUsuario, $nombre,$dni,$rol,$login,$password,$estado); 
                //}
            //}else{
              //  $imagen=null;
              //  $objController->insertarProducto($producto,$precio, $stock,$imagen); 
            //}
        }


         
    }
    else if(isset($_POST['extraerUsuarios'])){
        include_once("controllerGestionarUsuario.php");
        $objController = new controllerGestionarUsuario();
        $objController->ExtraerUsuarios();
}
else if(isset($_POST['idUsuario'])){
    include_once("controllerGestionarUsuario.php");
    $objController = new controllerGestionarUsuario();
    $objController->EliminarUsuario($_POST['id']);
    
}
else if(isset($_POST['BUsuario'])){
    include_once("controllerGestionarUsuario.php");
    $objController = new controllerGestionarUsuario();
    $objController->BuscarUsuario($_POST['BUsuario']);
}

else if(isset($_POST['id_editar'])){
    include_once("controllerGestionarUsuario.php");
    $objController = new controllerGestionarUsuario();
    $objController->BuscarUsuarioEditar($_POST['id_editar']);
}

    else if(isset($_POST['idmoficar'])){
    $idEditarU = $_POST['idmoficar'];
    $nombre = $_POST['UsuarioEdi'];
    $dni = $_POST['DNIEdi'];
    $rol = $_POST['RolEdi'];
    $login = $_POST['LoginEdi'];
    $password = $_POST['PasswordEdi'];
    $estado = $_POST['EstadoEdi'];
    
    

        $resulValidarCamposM = ValidarCampos($idUsuario,$nombre,$dni,$rol,$login,$password,$estado);
        if($resulValidarCamposM == 0){
            echo "Los datos ingresados NO son validos";
        }else {   
            include_once("controllerGestionarUsuario.php");
            $objController = new controllerGestionarUsuario();
            if(isset($_FILES['UsuarioEdi'])){
                $nombre=$_FILES['UsuarioEdi'];
                $valiNombre=validarNombre($nombre);

              //  if($valiImagen==0){
              //      echo "El formato de la imagen no es valido";
              //  }else{
                //    $objController->modificarUsuario($idEditarU, $nombre, $dni, $rol, $login, $password, $estado); 
              //  }
                
            }else{
                $valiNombre=null;
                $objController->modificarUsuario($idEditarU,$nombre,$dni,$rol,$login,$password,$estado); 
                
            }
        }
    }
    else{
        include_once("../shared/formMensajeSistema.php");
        $objMensaje = new formMensajeSistema;
        $objMensaje -> formMensajeSistemaShow("Se ha detectado un acceso no permitido","<a href='../index.php'>Ingrese adecuadamente</a>");
    }
       
 ?>



    

        









        
    