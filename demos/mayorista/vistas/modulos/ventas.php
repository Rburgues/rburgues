
<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table style="font-size:16px;" class="table table-bordered table-striped dt-responsive tablas" data-order="" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código factura</th>
           <th>Cliente</th>
           <th>Total</th>

          <?php
           if($_SESSION["perfil"] == "Administrador"){
           
           echo'
           <th>Acciones</th> 
           <th>Estado</th>';
           
           }
          ?>

         </tr> 

        </thead>

        <tbody>

        <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
          arsort($respuesta);
          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>

                  <td>$ '.number_format($value["total"],2).'</td>

                  <td><div style="width:50px;" class="btn-group"> ';
                      
                      if($_SESSION["perfil"] == "Administrador"){
                      echo '<a href="#" title="DESCARGAR PDF"><button class="btn-xs btn-info btnImprimirFactura"  codigoVenta="'.$value["codigo"].'"><i class="fa fa-print"></i></button></a>';
                      echo '<span style="float:left;background-color:#FFF;color:#FFF;"></span>';
                      echo '<a href="#" title="ELIMINAR VENTA"><button class="btn-xs btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button></a>';
                     

                    

                    echo '</div> </td>

                    <td><div style="width:55px;" class="btn-group"> ';

                    $item=null;
                    $valor=null;
                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);
                      
                    if($value["estadoUsuario"] != 0){
                      echo '<a href="vistas/modulos/descarga_ok.php?codigo='.$value["codigo"].'"><button type="submit" name="submit" class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Descargado!</button></a>';
                      
                    }else{

                      echo '<a href="vistas/modulos/descarga_no.php?codigo='.$value["codigo"].'"><button type="submit" name="submit" class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Sin Procesar</button></a>';

                    }
                  }
                    echo '</div> </td>

                  

                  <td>

                     

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
      

      </div>

    </div>
    
  </section>

</div>




