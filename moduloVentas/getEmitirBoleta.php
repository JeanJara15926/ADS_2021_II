<?php


if(isset($_POST['ExtraerProformas'])){

    include_once("controllerEmitirBoleta.php");
    $objController = new controllerEmitirBoleta;
    $objController->ExtraerProformas();

}
else if(isset($_POST['codigoProforma'])){
    $codigoProforma=trim($_POST['codigoProforma']);
    include_once("controllerEmitirBoleta.php");
    $objController = new controllerEmitirBoleta;
    $objController->BuscarProformaCodigo($codigoProforma);

}
else if(isset($_POST['ObtenerCodigoNuevo'])){
    include_once("controllerEmitirBoleta.php");
    $objController = new controllerEmitirBoleta;
    $objController->obtenerCodigoNuevo();

}
else if(isset($_POST['fecha'])){
    $fecha=$_POST['fecha'];
    include_once("controllerEmitirBoleta.php");
    $objController = new controllerEmitirBoleta;
    $objController->BuscarProformaFecha($fecha);

}
else if(isset($_POST['Proforma'])){
    $Proforma = $_POST['Proforma'];
    $fechaProforma=$Proforma['fecha'];
    $fechaActual=date('Y-m-d');
    $fechaValidar=date("Y-m-d",strtotime($fechaProforma."+ 6 days"));// para la validez de 7 dias
    
    if(strtotime($fechaValidar)>=strtotime($fechaActual))
    {
        include_once("controllerEmitirBoleta.php");
        $objController = new controllerEmitirBoleta;
        
        $objController->ExtraerDetalleProforma($Proforma);
    }else{
        echo "0";
    }

}
else if(isset($_POST['Boleta'])){
    $Boleta = $_POST['Boleta'];
    $DetalleBoleta = $_POST['DetalleBoleta'];
    $res="";
    if($Boleta['tipo']=="F")
    {
        $documento=trim($Boleta['documento']);
        $nom_documento=trim($Boleta['nom_cliente']);

        if(strlen($documento)>0 && strlen($nom_documento)>0){
            include_once("controllerEmitirBoleta.php");
            $objController = new controllerEmitirBoleta;
            $res=$objController->InsertarBoleta($Boleta,$DetalleBoleta);
        }else{
            $res= "Debe ingresar el RUC y Razón social";
        }
    }else{
        include_once("controllerEmitirBoleta.php");
        $objController = new controllerEmitirBoleta;
        $res=$objController->InsertarBoleta($Boleta,$DetalleBoleta);
    }
    echo $res;

}
else{
    include_once("../shared/formMensajeSistema.php");
    $objMensaje = new formMensajeSistema;
    $objMensaje -> formMensajeSistemaShow("Se ha detectado un acceso no permitido","<a href='../index.php'>Ingrese adecuadamente</a>");
}


?>