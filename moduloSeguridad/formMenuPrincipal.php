<?php
    include_once("../shared/formulario.php");
    include_once("../moduloVentas/formGestionarProducto.php");
    class formMenuPrincipal extends formulario{
      public function formMenuPrincipalShow($listaPrivilegios){
        $this -> encabezadoShow("Bienvenido");
        $numero_privilegios = count($listaPrivilegios);
        ?>            
        <p>Usuario activo:<?php echo $_SESSION['login'] ?> </p>

        <header>
          
          <div class="contenedor" id="uno" >           
              <img class="icon" src="../img/icono1-1.png">
              <p class="texto">Emitir Proforma</p>                                       
          </div>
          
          <div class="contenedor" id="dos">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
          <div class="contenedor" id="tres">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
          <div class="contenedor" id="cuatro">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
          <div class="contenedor" id="cinco">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
          <div class="contenedor" id="seis">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
          <div class="contenedor" id="siete">
            <img class="icon" src="../img/icono1-1.png">
            <p class="texto">Emitir Proforma</p>
          </div>
        </header>  
        <table class="ADSLogin">
                  <?php for($i = 0; $i < $numero_privilegios; $i++)	{?>
                  <tr>
                      <td width="54" rowspan="2" valign="middle"><img src="../imagenes/<?php echo $listaPrivilegios[$i]['image']?>" /></td>
                      <td width="145" class="nav3"><?php echo $listaPrivilegios[$i]['label']?></td>
                  </tr>
                  <tr>
                      <td>
                          <form id="form1" name="form1" method="post" action="<?php echo $listaPrivilegios[$i]['path']?>">
                              <input type="hidden" name="login" value="<?php echo $_SESSION['login'] ?>" />
                              <input type="submit" name="bntOk" id="bntOk" value="..." />
                          </form>
                      </td>
                  </tr>
                  <?php	}	?>
              </table>
        <?php          
        //$this->piePaginaShow();
      }
    }
?>