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

        public function ExtraerUsuarios(){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuarios limit 10";
            $result = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $producto=array();
            $numero_filas = mysqli_num_rows($result); 
            for($i=0;$i < $numero_filas;$i++){
                $usuario[$i] =mysqli_fetch_array($result);
            }            
            return ($usuario);
        }

        public function insertarUsuarios($nombre,$dni,$rol,$user,$contra){
            $conn=$this->conectar();
            $SQL ="INSERT INTO usuarios(nombre, dni, rol, login, password, estado) VALUES ('$nombre', $dni, '$rol', '$user', '$contra', '1')";
            $result = mysqli_query($conn,$SQL);
            $this->desconectar($conn);
        }

        public function EliminarUsuario($idEliminar){
            $conn=$this->conectar();
            $SQL ="DELETE FROM usuarios WHERE idUsuario=$idEliminar";
            $result = mysqli_query($conn,$SQL);
            $this->desconectar($conn);
        }

        public function BuscarUsuarioLogin($buscar){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuarios WHERE login LIKE '%$buscar%'";
            $resulti = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $ListaProductos=array();
            $numero_filas = mysqli_num_rows($resulti);
            for($i=0;$i < $numero_filas;$i++){
                $ListaUsuariosB[$i] =mysqli_fetch_array($resulti);
            }   
            return ($ListaUsuariosB);  
        }

        public function BuscarUsuarioEdit($idEditar){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuarios WHERE idUsuario = $idEditar";
            $resulti = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $numero_filas = mysqli_num_rows($resulti); 
            for($i=0;$i < $numero_filas;$i++){
                $usuarioE[$i] =mysqli_fetch_array($resulti);
            }            
            return ($usuarioE);
        }

        public function UpdateUsuarios($idGuardarUsuarioM,$nombre,$dni,$rol,$user,$contra){
            $conn=$this->conectar();
            $SQL ="UPDATE usuarios SET nombre='$nombre',DNI=$dni,rol='$rol',login='$user',password='$contra' WHERE idUsuario=$idGuardarUsuarioM";
            $result = mysqli_query($conn,$SQL);
            $this->desconectar($conn);
        }







        
    
    }









        
?>