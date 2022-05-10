<?php



// simple conexion a la base de datos
function connect(){
	return new mysqli("127.0.0.1:3306","u657661285_mayorista_demo","Rburgues28-03","u657661285_pos");   //host + user + password + baseD
}
$con = connect();
if (!$con->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
       die("Error cargando el conjunto de caracteres utf8");
}

?>