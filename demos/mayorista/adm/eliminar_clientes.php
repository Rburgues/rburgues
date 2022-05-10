<?php //Ejemplo curso PHP aprenderaprogramar.com

function connect(){
	return new mysqli("127.0.0.1:3306","u657661285_mayorista_demo","Rburgues28-03","u657661285_pos");   //host + user + password + baseD
}
$con = connect();

$sqlSelect = "TRUNCATE TABLE clientes";
$result = mysqli_query($con, $sqlSelect);

echo '';

?>

<div style="margin-top:100px; width:100%;">

<div style="font-size:72px; font-family:'sans serif'; font-weight:600px;text-align:center;">Se han eliminado los datos correctamente</div>

</div>


<div style="font-size:48px; font-weight:600px;text-align:center; margin-top:50px;">
<a href="cargar_clientes.php"><button style="width:300px; height:60px;font-size:48px;">VOLVER</button></a>
</div>