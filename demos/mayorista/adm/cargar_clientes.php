<?php
include('dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $id = "";
                if(isset($Row[0])) {
                    $id = mysqli_real_escape_string($con,$Row[0]);
                }
                
                $nombre = "";
                if(isset($Row[1])) {
                    $nombre = mysqli_real_escape_string($con,$Row[1]);
                }
				
                $direccion = "";
                if(isset($Row[2])) {
                    $direccion = mysqli_real_escape_string($con,$Row[2]);
                }
                
                $telefono = "";
                if(isset($Row[3])) {
                    $telefono = mysqli_real_escape_string($con,$Row[3]);
                }
				
                $horarioCierre = "";
                if(isset($Row[4])) {
                    $horarioCierre = mysqli_real_escape_string($con,$Row[4]);
                }

                $zona = "";
                if(isset($Row[5])) {
                    $zona = mysqli_real_escape_string($con,$Row[5]);
                }
                
                if (!empty($id) || !empty($nombre) || !empty($direccion) || !empty($telefono) || !empty($horarioCierre) || !empty($zona) ) {
                    $query = "insert into clientes(id, nombre, direccion, telefono, horarioCierre, zona) values('".$id."','".$nombre."','".$direccion."','".$telefono."','".$horarioCierre."','".$zona."')";
                    $resultados = mysqli_query($con, $query);
                
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8 Unicode">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>Importar DATOS DESDE EXCEL</title>

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
  <div style="width:100%;height:50px; padding-top:10px;text-align:center; font-weight: 600; font-size:24px;"><a href="index.php" style="color:#FFF; text-decoration:none;">DISTRIBUIDORA MARYSOL</a></div>
  
  </nav>

</header>

<!-- Begin page content -->

<div class="container">
  <h4 style="text-transform:Uppercase" class="mt-5">Cargar Bases de Datos de Clientes</h4>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->

      
    <div class="outer-container">

        <span>1 - Primero presione Borrar Datos Antiguos >>></span>
        <a href="eliminar_clientes.php">
        <input type="submit" name="submit" value="Borrar Datos Antiguos" />
        </a>


        <form  style="margin-top:30px;" action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>2 - Seleccione el archivo Excel "Clientes3.0.xls" </label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx"><br>
                    <span >3 - Presione "Guardar Datos" >>></span>
                <button style="margin-top:20px;" type="submit" id="submit" name="import"
                    class="btn-submit">Guardar Datos</button>

                    
            
            </div>
        
        </form>
                    
    </div>



    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT * FROM clientes order by nombre";
    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 1)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Comercio</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Horario Cerrado</th>
                <th>Zona</th>



            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['nombre']; ?></td>
            <td><?php  echo $row['direccion']; ?></td>
            <td><?php  echo $row['telefono']; ?></td>
            <td><?php  echo $row['horarioCierre']; ?></td>
            <td><?php  echo $row['zona']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer style="text-align:center;" class="footer">
  <div class="container"> <span class="text-muted">
    <p>Administracion de Sistema</p>
    </span> </div>
</footer>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>