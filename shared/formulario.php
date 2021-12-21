<?php
    class formulario{
        protected function encabezadoShowInit($titulo){
            ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <!-- ICONO CARTERA -->
                    <link rel="icon" href="https://i.pinimg.com/736x/76/db/60/76db608c4cb10408d7438e59ae7d76ed.jpg">
                    <!-- ESTILOS CSS-->
                    <link href="../css/login.css" type="text/css" rel="stylesheet" />                    
                    <title> <?php echo ucwords(strtolower($titulo)); ?></title>
                </head>
                <body style="font-family: 'Didact Gothic', sans-serif;" class="fondo"> 
            <?php
        }

        protected function encabezadoShow($titulo){
            ?>
                <!DOCTYPE html>
                <html lang="es" >
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <!-- ICONO CARTERA -->
                    <link rel="icon" href="https://i.pinimg.com/736x/76/db/60/76db608c4cb10408d7438e59ae7d76ed.jpg"> 
                     <!-- BOOTSTRAP -->
                     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
                    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                    crossorigin="anonymous">                   
                    <!-- ESTILOS CSS-->
                    <link href="../css/generales.css" type="text/css" rel="stylesheet" />
                    <link href="../css/menu.css" type="text/css" rel="stylesheet" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title> <?php echo ucwords(strtolower($titulo)); ?></title> 
                </head>
                <body style="font-family: 'Didact Gothic', sans-serif;" class="fondo">      
                   
                <div class="barra">
                    <p class="text-white" class="usuario">Usuario activo:<?php echo $_SESSION['login'] ?> </p>
                </div>     
                <hr>   
                <table class="ADSLogin">
                    <tr>
                        <td><img src="../img/banner2.jpg" alt="" width="1000" height="200"></td>
                    </tr>
                </table>
                <hr>   
                <br><br><br><br><br><br>
            <?php
        }

        protected function encabezadoShowSimple($titulo){
            ?>
                <!DOCTYPE html>
                <html lang="es"> 
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">                    
                    <link rel="icon" href="https://i.pinimg.com/736x/76/db/60/76db608c4cb10408d7438e59ae7d76ed.jpg">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                    <!-- BOOTSTRAP -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
                    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                    crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                    <!-- GOOGLE FONTS-->
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
                    
                    <link href="../styles/generales.css" type="text/css" rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
                    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="../css/generales.css" type="text/css" rel="stylesheet" />
                    <title> <?php echo ucwords(strtolower($titulo)); ?></title> 
                </head>
                <body style="font-family: 'Didact Gothic', sans-serif;" class="fondo">                    
                    <nav class="navbar navbar-dark bg-dark">
                        <div class="container-fluid">
                            <span class="navbar-brand mb-0 h1"><?php echo ucwords(strtolower($titulo)); ?></span>
                        </div>
                    </nav>
                    <br>                
            <?php
        }
        protected function piePaginaShow(){
            ?>            
            <footer class="text-center text-lg-start bg-dark text-muted" >
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright: Carteras EDMAR
                </div>
            </footer>            
                </body>
                </html>
            <?php
        }

    }
?>