<?php
    class controllerCierreCaja{
        public function extraerMontoComprobante(){
            include_once("../model/comprobante.php");            
            $monto = $objCompro->extraerMontoComprobante();            
            echo $monto;
        }
        public function extraerMontoReembolso(){
            include_once("../model/reclamo.php");          
            $montoReclamo = $objReclamo->extraerMontoReclamo();            
            echo $montoReclamo;
        }
    }
?>