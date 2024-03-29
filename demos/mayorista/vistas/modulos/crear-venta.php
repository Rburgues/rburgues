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
    
    <h1 style="margin-top:10px;">
      
      Tomar Pedido
    
    </h1>

    <ol class="breadcrumb">
      
      
    
    </ol>

  </section>

  <section class="content">

    <div class="row">






<!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->
      <div class="col-lg-6 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
            
        <tbody> 


            <thead>

            <tr>
            <th style="width: 10px">#</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
            </tr>

            </thead>

              

   
        </tbody>  

            </table>

          </div>

        </div>


      </div>
      



      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div style="float:noth;" class="col-lg-5 col-xs-12">
        
        <div class="box box-danger">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div>

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" readonly>';
                  

                    }else{

                      foreach ($ventas as $key => $value) {
                        
                        
                      $codigo = $value["id"] + 9880;
                      }

                      



                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div> 

                <div style="width:100%;margin-bottom:15px;background-color: #e3e3e3;"><span style="font-weight:700;">Lista de Pedido:</span></div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">


                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                

                <button type="button"class="btn btn-default hidden-lg btnAgregarProducto hidden-xs">Agregar producto</button>

                <hr>

                <div class="row">
                ======================================-->


           <!--=====================================
            LISTA DE PRODUCTOS PARA AGREGAR PRODUCTO
            ======================================-->


            <?php

            if($_SESSION["perfil"] == "Vendedor"){

            echo'<table style="width:100% font-size:10px;" class="table table-bordered table-striped dt-responsive tablaVentas" data-page-length="5">
            
            <tbody style="width:100%;font-size:13px;"> 


            <thead>

            <tr>
            <th style="width: 5px">#</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
            </tr>

            </thead>
            </tbody>  

            </table>';
            }
              ?>
              <!--=====================================
              SEPARADOR 
              ======================================--> 

            <div style="font-weight:700;width:100%;height:20px;margin-top:25px;background-color: #e3e3e3;"><span>Cargar Cliente:</span></div>


                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);
                     
                       foreach ($categorias as $key => $value ) {

                         echo '<option value="'.$value["id"].'">'.$value["id"]." - ".$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                    <!--
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                    -->
                  </div>
                
                </div>






                <!--=====================================
                ENTRADA COMENTARIO DE VENDEDOR
                ======================================-->

                
                  
                <div class="form-group">
                  
             
                    
                     <div class="input-group">
                      
                      <div style="width:360px;font-size:14px; font-weight:700;float:left;background-color: #e3e3e3;margin-top:20px;">Comentario</div>
                      <div><input style="width:360px; margin-left:0px;" class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago"></div>
                        
                        
                        
                        <!--
                          <input value="">Seleccione método de pago</input>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>
                        -->                  
                      </input>    

                    </div>

                 

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>


                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-10 pull-right">
                    
                    <table class="tables">

                      <thead>

                        <tr>
                          <th> </th>
                          <th style="background-color: #e3e3e3;">Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="hidden" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" >

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" >

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" >

                              
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <br>
      
              </div>

          </div>

          <div style="text-align:center;" class="box-footer">

            <button type="submit" style="width:90%;background-color:#990000; color:#FFF;" class="btn center">Guardar Pedido</button>

          </div>

        </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>
            
      </div>

      

    </div>
   
  </section>

</div> 



<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>
