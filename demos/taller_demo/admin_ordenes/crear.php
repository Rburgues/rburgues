<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }

    $imagen2 = '';
    if ($_FILES["imagen_usuario2"]["name"] != '') {
        $imagen2 = subir_imagen2    ();
    }
    $imagen3 = '';
    if ($_FILES["imagen_usuario3"]["name"] != '') {
        $imagen3 = subir_imagen3    ();
    }
    $imagen4 = '';
    if ($_FILES["imagen_usuario4"]["name"] != '') {
        $imagen3 = subir_imagen4    ();
    }
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellidos, telefono, matricula, marca, modelo, diagnostico, trabajorealizado, fecha_creacion, fecha_entrega, imagen, imagen2, imagen3, imagen4)VALUES(:nombre, :apellidos, :telefono, :matricula, :marca, :modelo, :diagnostico, :trabajorealizado, :fecha_creacion, :fecha_entrega, :imagen, :imagen2, :imagen3, :imagen4)");

    $resultado = $stmt->execute(
        array(
            ':nombre'            => $_POST["nombre"],
            ':apellidos'         => $_POST["apellidos"],
            ':telefono'          => $_POST["telefono"],
            ':matricula'         => $_POST["matricula"],
            ':marca'             => $_POST["marca"],
            ':modelo'            => $_POST["modelo"],
            ':diagnostico'       => $_POST["diagnostico"],
            ':trabajorealizado'  => $_POST["trabajorealizado"],
            ':fecha_creacion'    => $_POST["fecha_creacion"],
            ':fecha_entrega'     => $_POST["fecha_entrega"],
            ':imagen'            => $imagen,
            ':imagen2'           => $imagen2,
            ':imagen3'           => $imagen3,
            ':imagen4'           => $imagen4
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_usuario_oculta"];
    }
    $imagen2 = '';
    if ($_FILES["imagen_usuario2"]["name"] != '') {
        $imagen2 = subir_imagen2();
    }else{
        $imagen2 = $_POST["imagen_usuario_oculta2"];
    }
    $imagen3 = '';
    if ($_FILES["imagen_usuario3"]["name"] != '') {
        $imagen3 = subir_imagen3();
    }else{
        $imagen3 = $_POST["imagen_usuario_oculta3"];
    }
    $imagen4 = '';
    if ($_FILES["imagen_usuario4"]["name"] != '') {
        $imagen4 = subir_imagen4();
    }else{
        $imagen4 = $_POST["imagen_usuario_oculta4"];
    }

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono, matricula=:matricula, marca=:marca, modelo=:modelo, diagnostico=:diagnostico, trabajorealizado=:trabajorealizado, fecha_creacion=:fecha_creacion, fecha_entrega=:fecha_entrega, imagen=:imagen, imagen2=:imagen2, imagen3=:imagen3, imagen4=:imagen4 WHERE id = :id");

    $resultado = $stmt->execute(
        array(
            ':nombre'            => $_POST["nombre"],
            ':apellidos'         => $_POST["apellidos"],
            ':telefono'          => $_POST["telefono"],
            ':matricula'         => $_POST["matricula"],
            ':marca'             => $_POST["marca"],
            ':modelo'            => $_POST["modelo"],
            ':diagnostico'       => $_POST["diagnostico"],
            ':trabajorealizado'  => $_POST["trabajorealizado"],
            ':fecha_creacion'    => $_POST["fecha_creacion"],
            ':fecha_entrega'     => $_POST["fecha_entrega"],
            ':imagen'            => $imagen,
            ':imagen2'           => $imagen2,
            ':imagen3'           => $imagen3,
            ':imagen4'           => $imagen4,
            ':id'    => $_POST["id_usuario"]
                        
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
        
        
    }
}