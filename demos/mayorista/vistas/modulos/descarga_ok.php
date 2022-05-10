<?php //Ejemplo curso PHP aprenderaprogramar.com

function connect(){
	return new mysqli("localhost","root","","pos");
}
$con = connect();

$codigo = $_GET["codigo"];

$sqlSelect = "UPDATE ventas SET estadoUsuario='0' WHERE codigo=$codigo";
$result = mysqli_query($con, $sqlSelect);

echo '';

header('Location:' . getenv('HTTP_REFERER'));

    
?>