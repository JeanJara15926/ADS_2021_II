<?php
    include_once("conexion.php");
    class Comprobante extends conexion{
        public function extraerMontoComprobante(){
            $conn=$this->conectar();
            $SQLP ="SELECT SUM(MontoTotal) FROM comprobante WHERE Fecha= CURRENT_DATE()";
            $resultado2 = mysqli_query($conn,$SQLP);  
            $this->desconectar($conn); 
            $numero_filas = mysqli_num_rows($resultado2); 
            for($i=0;$i < $numero_filas;$i++){
                $monto[0] =mysqli_fetch_array($resultado2);
            }            
            return ($monto[0]['SUM(MontoTotal)']);               
        }

        public function obtenerCodigoNuevo(){
            $conn=$this->conectar();
            $SQLP ="SELECT codigo from comprobante ORDER BY Codigo DESC LIMIT 1";
            $result = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);  
            $numero_filas = mysqli_num_rows($result); 
            $ultimoCodigo="";

            if($numero_filas==1){
                while ($proforma = $result->fetch_assoc()) {
                    $ultimoCodigo = $proforma['codigo'];
                }
                $cod = explode("-", $ultimoCodigo);
                $numCod = intval($cod[1])+1;
                $nDigitos = 4-strlen($numCod);
                $nuevoCodigo = "CO-";
                while($nDigitos>0){
                    $nuevoCodigo.= "0";
                    $nDigitos--;
                }
                $nuevoCodigo.= strval($numCod);
  
            }else{
                $nuevoCodigo="CO-0001";
            }
            
            return ($nuevoCodigo);
        }

        public function InsertarComprobante($Comprobante){

            $fecha=$Comprobante['fecha'];
            $codigo=$Comprobante['codigo'];
            $monto_total=$Comprobante['monto_total'];            


            
            $conn=$this->conectar();
            $SQLP ="INSERT INTO comprobante (idComprobante, Fecha, Codigo, MontoTotal) 
                    VALUES(default,'$fecha','$codigo',$monto_total)";
            $res="";
            if ($conn->query($SQLP) === TRUE) {
                $res ="1";
            } else {
                $res= "Error: " . $SQLP  . "<br>" . $conn->error;
            }        
            $this->desconectar($conn);
            return $res; 
        }

        public function obtenerIDComprobante($codigo){
            $conn=$this->conectar();
            $SQLP ="SELECT idComprobante from comprobante WHERE Codigo='$codigo'";
            $result = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);  
            $idcomprobante="";
            while ($comprobante = $result->fetch_assoc()) {
                    $idcomprobante = $comprobante['idComprobante'];
            } 
            return ($idcomprobante);
        }
        public function extraerComprobanteSinReclamo($boleta){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM comprobante WHERE Codigo='$boleta' AND idComprobante NOT IN(SELECT idComprobante FROM reclamo)";
            $resultado2 = mysqli_query($conn,$SQLP);  
            $this->desconectar($conn); 
            $comprobante=array();
            $numero_filas = mysqli_num_rows($resultado2); 
            for($i=0;$i < $numero_filas;$i++){
                $comprobante[$i] =mysqli_fetch_array($resultado2);
            }            
            return ($comprobante);
        }
        public function ExtraerComprobante($boleta){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM comprobante WHERE Codigo='$boleta'";
            $resultado2 = mysqli_query($conn,$SQLP);  
            $this->desconectar($conn); 
            $numero_filas = mysqli_num_rows($resultado2); 
            for($i=0;$i < $numero_filas;$i++){
                $comprobante[$i] =mysqli_fetch_array($resultado2);
            }            
            return ($comprobante);               
        }
        public function BuscarComprobanteDespacho($boleta){
            $conn=$this->conectar();
            $SQLP ="SELECT * FROM comprobante WHERE Codigo = '$boleta' and estadoDespacho='N'";
            $resulti = mysqli_query($conn,$SQLP);
            $this->desconectar($conn);
            $numero_filas = mysqli_num_rows($resulti); 
            $comprobanteb=array();
            for($i=0;$i < $numero_filas;$i++){
                $comprobanteb[$i] =mysqli_fetch_array($resulti);
            }            
            return ($comprobanteb);

        }
        public function cambiarEstado($ID){
            $conn=$this->conectar();
            $SQLP ="Update comprobante SET estadoDespacho = 'D' WHERE idComprobante=$ID";
            $resultado2 = mysqli_query($conn,$SQLP);  
            $this->desconectar($conn);
        }
        
        public function ExtraerIDComprobante($boleta){
            $conn=$this->conectar();
            $SQLP ="SELECT idComprobante FROM comprobante WHERE Codigo='$boleta'";
            $resultado2 = mysqli_query($conn,$SQLP);  
            $this->desconectar($conn); 
            $numero_filas = mysqli_num_rows($resultado2); 
            for($i=0;$i < $numero_filas;$i++){
                $comprobante[0] =mysqli_fetch_array($resultado2);
            }            
            return ($comprobante[0]['idComprobante']);               
        }
    }
?>