<?php
    include_once("formulario.php");
    class formMensajeSistema extends formulario{
        public function formMensajeSistemaShow($mensaje, $enlace){
            $this -> encabezadoShow("Mensaje del Sistema");
            ?>
            <br><br><br>
            <table class="ADSLogin">
                <tr>  
                    <td class="tdMensaje">MENSAJE SISTEMA</td>
                </tr>
                <tr>
                    <td class="imgLogin"><img src="../imagenes/chat.png" alt=""></td>
                </tr>
                <tr>
                    <td class="tdMensajeSecu"><?php echo $mensaje; ?></td> 
                </tr>
                <tr>
                    <td class="tdMensajeSecu"><?php echo $enlace; ?> </td>
                </tr>
            </table>
            <br><br><br><br><br><br><br>
            <?php          
            $this->piePaginaShow();
        }
    }
?>