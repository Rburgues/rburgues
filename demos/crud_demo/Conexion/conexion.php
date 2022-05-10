<?php 

$servidor = "mysql:dbname=u657661285_empresa
;host=127.0.0.1:3306";
$usuario = "u657661285_burgues";
$password = "Rburgues28-03";

try {
    $pdo = new PDO($servidor, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // echo "conectado...";
} catch (PDOException $e) {
    echo "Conexion mala.. " .$e->getMessage();
}

?>