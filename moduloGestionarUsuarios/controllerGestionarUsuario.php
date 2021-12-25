<?php
class controllerGestionarUsuarios{
// Moya
    public function insertarUsuario($idusuario,$nombre,$dni,$rol,$login,$password,$estado){
        include_once("../model/usuario.php");
        $objUsuario = new Usuario;
        $resultado=$objUsuario->insertarUsuario($idusuario,$nombre,$dni,$rol,$login,$password,$estado);
        if($resultado=0){
            echo "Error al insertar Usuario";
        }else{
            echo "1";
        }
    }

    //Extraer Usuario
    public function ExtraerUsuarios(){
        include_once("../model/usuario.php");
        $objUsuario_ii = new Usuario;
        $ListaUsuarios = $objUsuario_ii->ExtraerUsuarios();
        $filas=count($ListaUsuarios);
        $arr=array();
        for($i=0;$i<$filas;$i++){
            $arr[$i] = array(
                'idusuario' => $ListaUsuarios[$i]['idusuario'],
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
        $objUsuario_ii = new Usuario;
        $Usuario = $objUsuario_ii->BuscarUsuarioEditar($id_editar);
        $arr =  array(
            'idusuario' => $Usuario[0]['idusuario'],
            'nombre' => $Usuario[0]['nombre'], 
            'dni' => $Usuario[0]['dni'],
            'rol' => $Usuario[0]['rol'],
            'login' => $Usuario[0]['login'],
            'password' => $Usuario[0]['password'],
            'estado' => $Usuario[0]['estado']
        );
        echo json_encode($arr);
    }

    public function EliminarUsuario($idusuario){
        include_once("../model/usuario.php");
        $objProducto_ii = new Usuario;
        $objProducto_ii->EliminarUsuario($idusuario);
    }

    public function BuscarUsuario($nombre){
        include_once("../model/usuario.php");
        $objUsuario_ii = new Usuario;
        $ListaUsuarios = $objUsuario_ii->BuscarUsuarioNombre($nombre);
        $filas=count($ListaUsuarios);
        $arr=array();
        for($i=0;$i<$filas;$i++){
            $arr[$i] = array(
                'idusuario' => $ListaUsuarios[$i]['idusuario'],
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

    public function modificarUsuario($id_EditarChambicito,$idusuario,$nombre,$dni,$rol,$login,$password,$estado){
        include_once("../model/usuario.php");               
        $objProducto = new Producto;
        $objProducto->modificarProducto($idEditarChambicito,$producto,$precio, $stock,$imagen);
        if($retorno=0){
            echo "Error al actualizar producto";
        }else{
            echo "1";            
        }
    }

}




?>