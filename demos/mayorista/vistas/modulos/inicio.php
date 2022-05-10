<header>

<link rel="icon" href="vistas/img/plantilla/favicon.ico" />

</header>

<div style="background-color:hsl(207deg 40% 8%);" class="content-wrapper">

  <section class="content-header">
    
    

    <div style="text-align:center;">

    <img class="logo" src="vistas/img/plantilla/logo_distribuidora.png" style="margin-top:65px;margin-bottom:20px;" >
    
  

    </div>
    
  <div style="font-size:28px; font-weight:900;text-align:center;margin-top:25px;color:#FFF;">
      
      GESTION DE PEDIDOS
      
    
    </div>
    <div style="text-align:center; margin-top:40px;">

    <a href="crear-venta">
    <img class="botones_inicio" src="vistas/img/plantilla/tomarpedido2.png">         
    </a>

    </div>
    <?php

    if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){
    
    echo  '<div style="text-align:center; ">

    <a href="reportes">
    <img class="botones_inicio" src="vistas/img/plantilla/reportes2.png">         
    </a>

    </div>';
    }
    ?>
    
    <div style="text-align:center;">

  </section>

 
</div>
