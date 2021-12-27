<?php
    include_once("../shared/formulario.php");
    class formGestionarUsuarios extends formulario{
        public function formGestionarUsuariosShow(){
                $this -> encabezadoShowSimple("Gestionar Usuario");
                ?>


            <div class="container usuario">
                <div class="row">                    
                    <div class="col-10">
                        <p><i class='fas fa-user-alt'></i><?php echo $_SESSION['login'] ?>
                    </div>
                    <div class="col">
                        <form name="form3" method="post" action="../moduloSeguridad/getUsuario.php">                                                       
                                <button  style="color: white" name="retrocede" type="submit" class="btn btn-info" id="retrocede">
                                    VOLVER<i class="fa fa-arrow-circle-left"  style="margin-left:10px"></i>
                                </button>
                                <input name="login" type="hidden" id="login" value="<?php echo $_SESSION['login'] ?>">					
                        </form></p>
                    </div>
                </div>
            </div>


            <div class="container">
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="">
                        
                        <h1 class="text-center">REGISTRO USUARIO ♂♀</h1>
                        
                        <div class="mb-3 row">
                            <label for="text_IdUsuario" class="col-sm-2 col-form-label">ID USUARIO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_IdUsuario">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="text_Nombre" class="col-sm-2 col-form-label">NOMBRE</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_Nombre">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="text_DNI" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_DNI">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="text_Rol" class="col-sm-2 col-form-label">ROL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_Rol">

                                <select class="form-select form-select-sm" id="rol" aria-label=".form-select-sm example">
                                            <option value="Administrador">ADMINISTRADOR</option>
                                            <option value="Cajero">CAJERO</option>
                                            <option value="Vendedor">VENDEDOR</option>
                                            <option value="Despachador">DESPACHADOR</option>
                                </select>

                            </div>
                        </div>


                        









                        <div class="mb-3 row">
                            <label for="text_Login" class="col-sm-2 col-form-label">LOGIN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_Login">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="text_Password" class="col-sm-2 col-form-label">PASSWORD</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_Password">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="text_Estado" class="col-sm-2 col-form-label">ESTADO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_Estado">
                            </div>
                        </div>



                    

                        <div class="mb-3 row">
                            <div class="col-5"></div>
                            <div class="col">                                
                            <input type="button" value="Crear Usuario" id="registrar" onclick="registrarUsuario()" class="btn btn-primary btnRegistrarUsuarios">
                                        <input type="button" value="Modificar" id="editar" onclick="guardarUsuario()" class="btn btn-primary btnModificarUsuarios">
                            </div>
                        </div>
                    </div>

                </form>
                
            </div>
            <div class="container">
                <div class="">




                
                            <form action="" method="post">
                            <div class="form-group">
                                
                                <input type="hidden" id="idOcultoModificar">
                                
                            </div>
                    </form>
                




                    <h1 class="text-center">LISTA DE USUARIOS</h1>

                    <div class="mb-3 row">
                        <div class="col-11">
                        <div class="col-lg-6 ml-auto">
                                    <form action="" method="post">
                            <input type="text" class="form-control" onkeyup="BuscarUsuarioLogin()" id="BUsuario" placeholder="Ingrese el nombre del usuario">
                            <button class="btn btn-success" onclick="Buscarusuario()">Buscar</button>
                        </div>
                        </form>
                                </div>

                        
                    </div>

                    <div>
                        <table class="table table-hover table-resposive text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>LISTA USUARIO</th>
                                        <th>NOMBRE</th>
                                        <th>DNI</th>
                                        <th>ROL</th>
                                        <th>LOGIN</th>
                                        <th>PASSWORD</th>
                                        <th>ESTADO</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_usuarios">
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="../js/scriptGestionarUsuario.js"></script>
            <?php          
                $this->piePaginaShow();
        }
    }
?>

        