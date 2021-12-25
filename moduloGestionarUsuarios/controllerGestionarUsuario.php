<?php
class controllerGestionarUsuario{

    public function insertarUsuario($idUsuario,$nombre,$dni,$rol,$login,$password,$estado){
        include_once("../model/usuario.php");
        $objUsuario = new usuario;
        $anwer=$objUsuario->insertarUsuario($idUsuario,$nombre,$dni,$rol,$login,$password,$estado);
        if($answer=0){
            echo "Error al insertar Usuario";
        }else{
            echo "1";
        }
    }

    


    //Extraer Usuario
    public function ExtraerUsuarios(){
        include_once("../model/usuario.php");
        $objUsuario_ii = new usuario;
        $ListaUsuarios = $objUsuario_ii->ExtraerUsuarios();
        $filas=count($ListaUsuarios);
        $arr=array();
        for($i=0;$i<$filas;$i++){
            $arr[$i] = array(
                'idUsuario' => $ListaUsuarios[$i]['idUsuario'],
                'nombre' => $ListaUsuarios[$i]['nombre'], 
                'dni' => $ListaUsuarios[$i]['dni'],
                'rol' => $ListaUsuarios[$i]['rol'],
                'login' => $ListaUsuarios[$i]['login'],
                'password' => $ListaUsuarios[$i]['password'],
                'estado' => $ListaUsuarios[$i]['estado'],
            );
        }
        echo json_encode($arr);
    }

    public function BuscarUsuarioEditar($id_editar){
        include_once("../model/usuario.php");
        $objUsuario_ii = new usuario;
        $Usuario = $objUsuario_ii->BuscarUsuarioEditar($id_editar);
        $arr =  array(
            'idUsuario' => $Usuario[0]['idUsuario'],
            'nombre' => $Usuario[0]['nombre'], 
            'dni' => $Usuario[0]['dni'],
            'rol' => $Usuario[0]['rol'],
            'login' => $Usuario[0]['login'],
            'password' => $Usuario[0]['password'],
            'estado' => $Usuario[0]['estado']
        );
        echo json_encode($arr);
    }

    public function EliminarUsuario($idUsuario){
        include_once("../model/usuario.php");
        $objUsuario_ii = new usuario;
        $objUsuario_ii-> EliminarUsuario($idUsuario);
    }

    
    public function BuscarUsuario($nombre){
        include_once("../model/usuario.php");
        $objUsuario_ii = new usuario;
        $ListaUsuarios = $objUsuario_ii->BuscarUsuarioNombre($nombre);
        $filas=count($ListaUsuarios);
        $arr=array();
        for($i=0;$i<$filas;$i++){
            $arr[$i] = array(
                'idUsuario' => $ListaUsuarios[$i]['idUsuario'],
                'nombre' => $ListaUsuarios[$i]['nombre'], 
                'dni' => $ListaUsuarios[$i]['dni'],
                'rol' => $ListaUsuarios[$i]['rol'],
                'login' => $ListaUsuarios[$i]['login'],
                'password' => $ListaUsuarios[$i]['password'],
                'estado' => $ListaUsuarios[$i]['estado']
            );
        }
        echo json_encode($arr);
    }

    public function modificarUsuario($id_EditarChambicito,$idUsuario,$nombre,$dni,$rol,$login,$password,$estado){
        include_once("../model/usuario.php");               
        $objUsuario = new usuario;
        $objProducto->modificarUsuario($id_EditarChambicito,$idUsuario,$nombre,$dni,$rol,$login,$password,$estado);
        if($retorno=0){
            echo "Error al actualizar Usuario";
        }else{
            echo "1";            
        }
    }

}




?>