<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_usuario"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_usuario"]);
        $imagen2 = obtener_nombre_imagen2($_POST["id_usuario"]);
        $imagen3 = obtener_nombre_imagen3($_POST["id_usuario"]);
        $imagen4 = obtener_nombre_imagen4($_POST["id_usuario"]);
        
	if($imagen != '' || $imagen2 != '' || $imagen3 != '' || $imagen4 != '')
	{
		unlink("img/" . $imagen);
                unlink("img/" . $imagen2);
                unlink("img/" . $imagen3);
                unlink("img/" . $imagen4);
	}
	$stmt = $conexion->prepare(
		"DELETE FROM usuarios WHERE id = :id"
	);
	$resultado = $stmt->execute(
		array(
			':id'	=>	$_POST["id_usuario"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro Borrado';
	}
}



?>