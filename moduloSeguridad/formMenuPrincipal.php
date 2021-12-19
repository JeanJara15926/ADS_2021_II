<?php
include_once("../shared/formulario.php");
include_once("../moduloVentas/formGestionarProducto.php");
class formMenuPrincipal extends formulario
{
  public function formMenuPrincipalShow($listaPrivilegios)
  {
    $this->encabezadoShow("Bienvenido");
    $numero_privilegios = count($listaPrivilegios);
    ?>      
    
    <table class="ADSLogin">   
             
        <?php for ($i = 1; $i < $numero_privilegios; $i++) { ?>          
            
              <td width="54" rowspan="2" valign="middle">
                <div class="contenedor" id="dos">
                    <p class="texto"><?php echo $listaPrivilegios[$i]['label'] ?></p>
                    <img class="icon" src="../img/icono1-1.png">                    
                    <form id="form1" name="form1" method="post" action="<?php echo $listaPrivilegios[$i]['path'] ?>" >
                      <input type="hidden" name="login" value="<?php echo $_SESSION['login'] ?>"  />                      
                      <button type="submit" name="bntOk" id="bntOk" class="btn btn-outline-warning" > <?php echo $listaPrivilegios[$i]['label'] ?> </button>
                    </form>
                </div>
              </td>                        
        <?php  }  
        ?>
    </table>     
    <?php
     $this->piePaginaShow();     
  }
}
?>
      
