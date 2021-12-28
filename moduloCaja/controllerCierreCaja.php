<?php
    class controllerCierreCaja{
        public function extraerMontoComprobante(){
            include_once("../model/comprobante.php");
            //$objCompro = new Comprobante;
            $monto = $objCompro->extraerMontoComprobante();            
            echo $monto;
        }
        public function extraerMontoReembolso(){
            include_once("../model/reclamo.php");
           // $objReclamo = new Reclamo;
            $montoReclamo = $objReclamo->extraerMontoReclamo();            
            echo $montoReclamo;
        }
    }
?>