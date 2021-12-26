<?php
    include_once("..../shared/formulario.php");
    class formGestionarUsuarios extends formulario{
        public function formGestionarUsuariosShow(){
            $this -> encabezadoShowSimple("Gestionar Usuarios ♂♀");
            ?>
            
          //  <div class="container usuarios">
              //  <div class="row">                    
                    //<div class="col-10">
                      //  <p><i class='fas fa-user-alt'></i><?php echo $_SESSION['login'] ?>
                    //</div>
                    
               // </div>
            //</div>

            <div class="container">
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="">
                        <h1 class="text-center">REGISTRO USUARIOS</h1>
                        <div class="mb-3 row">
                            <label for="texto_IdUsuario" class="col-sm-2 col-form-label">ID USUARIO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_IdUsuario">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_Nombre" class="col-sm-2 col-form-label">NOMBRE</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_Nombre">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_DNI" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_DNI">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_Rol" class="col-sm-2 col-form-label">ROL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_Rol">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_Login" class="col-sm-2 col-form-label">LOGIN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_Login">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_Password" class="col-sm-2 col-form-label">PASSWORD</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_Password">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="texto_Estado" class="col-sm-2 col-form-label">ESTADO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="texto_Estado">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-5"></div>
                            <div class="col">                                
                                <input type="button" class="btn btn-primary Btn_CrearUsuario" value="Guardar" onclick="CrearUsuario()"/>
                                
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <?php
        }
    }
?>

        