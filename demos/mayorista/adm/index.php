<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.png" />
<title>Administracion Distrubuidora Marysol</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">




</head>

<body>



<header> 

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar fixed-top" style="background-color:#000; "> 
  <div style="width:100%;height:50px; padding-top:10px;text-align:center;color:#FFF; font-weight: 600; font-size:24px;">DISTRIBUIDORA MARYSOL</div>
  
  </nav>

</header>

<!-- Begin page content -->

<div style="margin-top:30px;" class="container">
  <div style="color:#000; font-size:22px; font-weight: 700; text-align:center;">CARGAR BASES DE DATOS</div>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->

      <h5 style="text-align:center; font-weight: 700;" class="mt-5">ADMINISTRAR CLIENTES Y ARTICULOS</h5>
    <div style="text-align:center; background-color:#; margin-top:5%; padding: 8% 0% 8% 0%" class="outer-container">

        
        <a href="cargar_clientes.php">
        <input style="width:250px; height:50px; font-size:24px; font-weight:600;margin:10px;" type="submit" name="submit" value="CARGAR CLIENTES" />
        </a>
        
         <a href="cargar_articulos.php">
        <input style="width:250px; height:50px; font-size:24px; font-weight:600" type="submit" name="submit" value="CARGAR ARTICULOS" />
        </a>

</div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         

    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer style="text-align:center; padding-bottom:150px;" class="footer">
  <div class="container"> <span class="text-muted">

  <div style="text-align:center;">
<a style="text-decoration:none;" href="../index.php">
<span style="font-size:22px; font-weight:700; color:#000000;">VOLVER AL SISTEMA</span>
</a>

</div>

<p style="color:#000000; font-weight:500;">Software a medida <a style="color:#000000; text-decoration:none" href="https://www.facebook.com/softwareandhelp/" target="_blank"><img class="logo" src="sh_logo.png" style="width:50px; height:50px; margin-right:3px;" >Software & Help</a></p></div>
</footer>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>