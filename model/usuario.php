<?php
    include_once("conexion.php");
    class usuario extends conexion{
        public function VerificarUsuario($login,$password){ 
            $usuario=array();
            $conn=$this->conectar();
            $SQL ="Select * from usuarios where login='$login' and password='$password' and estado=1";
            $result = mysqli_query($conn,$SQL);
            $this->desconectar($conn);
            $numero_filas_encontradas = mysqli_num_rows($result);       
            if($numero_filas_encontradas == 1){
                for($i=0;$i < $numero_filas_encontradas;$i++){
                    $usuario[$i] =mysqli_fetch_array($result);
                }  
                return $usuario;
            }else{
                return (0);
            }
        }

        public function ObtenerIDUsuario($login){ 
            $conn=$this->conectar();
            $SQL ="Select idUsuario from usuarios where login='$login'";
            $result = mysqli_query($conn,$SQL);
            $this->desconectar($conn);
            $numero_filas_encontradas = mysqli_num_rows($result);       
            if($numero_filas_encontradas == 1){
                for($i=0;$i < $numero_filas_encontradas;$i++){
                    $usuario[$i] =mysqli_fetch_array($result);
                }
                return $usuario[0]['idUsuario']; 
            }else{
                return (0);
            }
        }
    }
?>