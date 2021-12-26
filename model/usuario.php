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







        public function insertarUsuario($idUsuario,$nombre,$dni,$rol,$login,$password,$estado){

            $conn=$this->conectar();
            $retorno=0;
            
            $this->desconectar($conn); 
            return $retorno;
        }
        public function EliminarUsuario($idUsuario){
            $conn=$this->conectar();
            $SQLP ="DELETE FROM usuario WHERE id = $idUsuario";
            $result = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);              
        }
        public function BuscarUsuarioNombre($nombre){  
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuario WHERE usuario LIKE '%$nombre%'";
            $resulti = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $ListaUsuarios=array();
            $numero_filas = mysqli_num_rows($resulti);
            for($i=0;$i < $numero_filas;$i++){
                $ListaProductos[$i] =mysqli_fetch_array($resulti);
            }   
            return ($ListaUsuarios);  
        }
        public function BuscarUsuarioEditar($id_editar){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuario WHERE id = $id_editar";
            $resulti = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $numero_filas = mysqli_num_rows($resulti); 
            for($i=0;$i < $numero_filas;$i++){
                $usuarioEditar[$i] =mysqli_fetch_array($resulti);
            }            
            return ($usuarioEditar);
        }
        public function ExtraerUsuarios(){  
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM usuario LIMIT 12";
            $result = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $usuario=array();
            $numero_filas = mysqli_num_rows($result); 
            for($i=0;$i < $numero_filas;$i++){
                $usuario[$i] =mysqli_fetch_array($result);
            }            
            return ($usuario);
        }
        public function modificarUsuario($idEditarU,$nombre,$dni,$rol,$login,$password,$estado){
            
            $conn=$this->conectar();     
                
            $retorno=0;            
            if($idEditarU==null){
                $SQL ="UPDATE usuario SET usuario='$idEditarU', nombre= $nombre, dni=$dni, rol=$rol, login=$login,password=$password, estado=$estado  
                WHERE id=$idEditarU";
                $result = mysqli_query($conn,$SQL);
                $retorno = 1;
            }else{
               // if (move_uploaded_file($imagen["tmp_name"], "../imagenes/".$imagen['name'])) {
                 //   $nom_imagen=$imagen['name'];
                 //   $SQL ="UPDATE producto SET producto='$producto',precioU=$precio,stock=$stock,imagen='$nom_imagen' 
                 //   WHERE id=$idEditarP";
                 //   $result = mysqli_query($conn,$SQL);
                 //   $retorno = 1;
                //} else {
                    $retorno = 0;
                //}
            }
    
            $this->desconectar($conn);
            return $retorno;
    
        }









    }    
?>