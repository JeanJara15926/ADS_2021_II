<?php
    include_once("conexion.php");
    class detalleBoleta extends conexion{
 
        public function InsertarDetalleBoleta($detalleBoleta,$idBoleta){

            $filas=count($detalleBoleta);
            $conn=$this->conectar();
            $res="0";
            for($i=0;$i<$filas;$i++){
                $id_producto=$detalleBoleta[$i]['id_producto'];
                $cantidad=$detalleBoleta[$i]['cantidad'];
                $precioU=floatval($detalleBoleta[$i]['precioU']);
                $envases=$detalleBoleta[$i]['envases'];
                $monto=$detalleBoleta[$i]['monto'];
                $SQLP ="INSERT INTO detalleboleta (id_producto,id_boleta,cantidad,precioU,envases,monto)
                        VALUES($id_producto,$idBoleta,$cantidad,$precioU,$envases,$monto)";
                
                if ($conn->query($SQLP) === TRUE) {
                    $res ="1";
                } else {
                    $res= "Error: " . $SQLP  . "<br>" . $conn->error;
                    $i=$filas;
                } 
            }
            $this->desconectar($conn);
            return $res; 
        }


    }
?>