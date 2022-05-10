<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reportes de ventas
    
    </h1>

    

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
      
      <div style="width:100%; text-align:center;">Selecciona la fecha a descargar: </div>

        <div style="text-align:center;margin-top:10px;">
         
          <button  style="width:30%;" type="button" class="btn btn-default" id="daterange-btn2">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        
         
      </div>

      <div class="box-body">
        
        <div  class="row">

          <div class="col-xl-12">
            
            <?php

            include "reportes/grafico-ventas.php";
            
            ?>

          </div>
          
        </div>

      </div>

      <div style="width:100%; text-align:center; padding-left:8%;"> 

        <div style="text-align:center;margin-top:10px;">
         
        <?php

        include "reportes/compradores.php";
        ?>

        </div>

        </div>
         
      </div>
      

      <div style="text-align:center; padding:30px;" class="box-tools">

        <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

           echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

        }         

        ?>
           
           <button class="btn btn-success" style="margin-bottom:15px">Descargar ventas en Excel</button>

          </a>

        </div>
      
    </div>

  </section>
 
 </div>
