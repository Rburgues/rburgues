<?php

include("conexion.php");
include("funciones.php");


if (isset($_POST["id_usuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre"] = $fila["nombre"];
        $salida["apellidos"] = $fila["apellidos"];
        $salida["telefono"] = $fila["telefono"];
        $salida["matricula"] = $fila["matricula"];
        $salida["marca"] = $fila["marca"];
        $salida["modelo"] = $fila["modelo"];
        $salida["diagnostico"] = $fila["diagnostico"];
        $salida["trabajorealizado"] = $fila["trabajorealizado"];
        $salida["fecha_creacion"] = $fila["fecha_creacion"];
        $salida["fecha_entrega"] = $fila["fecha_entrega"];
        if ($fila["imagen"] != "") {
            $salida["imagen_usuario"] = '<a target="_blank" style="cursor: -webkit-zoom-in;" href="img/' . $fila["imagen"] . '"><img src="img/' . $fila["imagen"] . '" class="img-thumbnail" style="width:150px; height:150px;" /></a><input type="hidden" name="imagen_usuario_oculta" value="'.$fila["imagen"].'" />';
        }else{
            $salida["imagen_usuario"] = '<input type="hidden" name="imagen_usuario_oculta" value="" />';
        }

        if ($fila["imagen2"] != "") {
            $salida["imagen_usuario2"] = '<a target="_blank" style="cursor: -webkit-zoom-in;" href="img/' . $fila["imagen2"] . '"><img src="img/' . $fila["imagen2"] . '"  class="img-thumbnail" style="width:150px; height:150px;" /></a><input type="hidden" name="imagen_usuario_oculta2" value="'.$fila["imagen2"].'" />';
        }else{
            $salida["imagen_usuario2"] = '<input type="hidden" name="imagen_usuario_oculta2" value="" />';
        }
        if ($fila["imagen3"] != "") {
            $salida["imagen_usuario3"] = '<a target="_blank" style="cursor: -webkit-zoom-in;" href="img/' . $fila["imagen3"] . '"><img src="img/' . $fila["imagen3"] . '"  class="img-thumbnail" style="width:150px; height:150px;" /></a><input type="hidden" name="imagen_usuario_oculta3" value="'.$fila["imagen3"].'" />';
        }else{
            $salida["imagen_usuario3"] = '<input type="hidden" name="imagen_usuario_oculta3" value="" />';
        }
        if ($fila["imagen4"] != "") {
            $salida["imagen_usuario4"] = '<a target="_blank" style="cursor: -webkit-zoom-in;" href="img/' . $fila["imagen4"] . '"><img src="img/' . $fila["imagen4"] . '"  class="img-thumbnail" style="width:150px; height:150px;" /></a><input type="hidden" name="imagen_usuario_oculta4" value="'.$fila["imagen4"].'" />';
        }else{
            $salida["imagen_usuario4"] = '<input type="hidden" name="imagen_usuario_oculta4" value="" />';
        }
    }

    echo json_encode($salida);
}




