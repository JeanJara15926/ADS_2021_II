<?php
class controllerGestionarUsuario{

        public function ExtraerUsuarios(){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $ListaUsuario = $objUsuario->ExtraerUsuarios();
            $filas=count($ListaUsuario);
            $arr=array();
            for($i=0;$i<$filas;$i++){
                $arr[$i] = array(
                    'idUsuario' => $ListaUsuario[$i]['idUsuario'],
                    'nombre' => $ListaUsuario[$i]['nombre'],
                    'dni' => $ListaUsuario[$i]['DNI'],
                    'rol' => $ListaUsuario[$i]['rol'],
                    'login' => $ListaUsuario[$i]['login'],
                    'password' => $ListaUsuario[$i]['password'],
                    'estado' => $ListaUsuario[$i]['estado'],
				    
                );
            }
            echo json_encode($arr);
        
        }
        public function UpdateUsuarios($idGuardarUsuarioM,$nombre,$dni,$rol,$user,$contra,$estado){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $objUsuario->UpdateUsuarios($idGuardarUsuarioM,$nombre,$dni,$rol,$user,$contra,$estado);
        }
        public function BuscarUsuarioEdit($idEditar){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $resultado = $objUsuario->BuscarUsuarioEdit($idEditar);
            $arr =  array(
                'idUsuario' => $resultado[0]['idUsuario'],
                'nombre' => $resultado[0]['nombre'],
                'dni' => $resultado[0]['DNI'],
                'rol' => $resultado[0]['rol'],
                'login' => $resultado[0]['login'],
                'password' => $resultado[0]['password'],
                'estado' => $resultado[0]['estado'],
            );
            echo json_encode($arr);
        }
        public function insertarUsuarios($nombre,$dni,$rol,$user,$contra,$estado){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $objUsuario->insertarUsuarios($nombre,$dni,$rol,$user,$contra,$estado);
        }
        public function EliminarUsuario($idEliminar){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $objUsuario->EliminarUsuario($idEliminar);
        }
        
        public function BuscarUsuarioLogin($buscar){
            include_once("../model/usuario.php");
            $objUsuario = new usuario;
            $ListaUsuario = $objUsuario->BuscarUsuarioLogin($buscar);
            $filas=count($ListaUsuario);
            $arr=array();
            for($i=0;$i<$filas;$i++){
                $arr[$i] = array(
                    'idUsuario' => $ListaUsuario[$i]['idUsuario'],
                    'nombre' => $ListaUsuario[$i]['nombre'],
                    'dni' => $ListaUsuario[$i]['DNI'],
                    'rol' => $ListaUsuario[$i]['rol'],
                    'login' => $ListaUsuario[$i]['login'],
                    'password' => $ListaUsuario[$i]['password'],
                    'estado' => $ListaUsuario[$i]['estado'],
                );
            }
            echo json_encode($arr);
        
        }
        
    }
?>