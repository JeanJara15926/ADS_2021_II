<?php
    include_once("./shared/formulario.php");
    class formAutenticarUsuario extends formulario{
        public function formAutenticarUsuarioShow(){
            $this -> encabezadoShowInit("Autenticar Usuario");
            ?>
            <form action="./moduloSeguridad/getUsuario.php" method="POST" >
                <div class="body"></div>
                <div class="grad"></div>
                    <div class="header">
                        <div>Carteras<span>Edmar</span></div>
                    </div>
                <br>
                    <div class="login">
                        <input type="text" placeholder="username" name="login" id="login"><br>
                        <input type="password" placeholder="password" name="password" id="password"><br>
                        <input type="submit" value="LOGIN" name="btnEnviar">
                    </div>
                </br>
            </form>
            <?php            
        }
    }
?>