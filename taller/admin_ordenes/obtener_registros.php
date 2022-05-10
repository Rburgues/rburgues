<?php

    include("conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM usuarios ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE matricula LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR apellidos LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
    }else{
        $query .= 'ORDER BY id DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        $imagen = '';
        if($fila["imagen"] != ''){
            $imagen = '<img src="img/' . $fila["imagen"] . '"  class="img-thumbnail" width="50" height="35" />';
        }else{
            $imagen = '';
        }

        $imagen2 = '';
        if($fila["imagen2"] != ''){
            $imagen2 = '<img src="img/' . $fila["imagen2"] . '"  class="img-thumbnail" width="50" height="35" />';
        }else{
            $imagen2 = '';
        }
        
        $imagen3 = '';
        if($fila["imagen3"] != ''){
            $imagen3 = '<img src="img/' . $fila["imagen3"] . '"  class="img-thumbnail" width="50" height="35" />';
        }else{
            $imagen3 = '';
        }
        
        $imagen4 = '';
        if($fila["imagen4"] != ''){
            $imagen4 = '<img src="img/' . $fila["imagen4"] . '"  class="img-thumbnail" width="50" height="35" />';
        }else{
            $imagen4 = '';
        }

        $sub_array = array();
        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["apellidos"];
        $sub_array[] = $fila["telefono"];
        $sub_array[] = $fila["matricula"];
        $sub_array[] = $fila["marca"];
        $sub_array[] = $fila["modelo"];
        $sub_array[] = $fila["fecha_creacion"];
        $sub_array[] = $fila["fecha_entrega"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs editar">Detalle</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );



    echo json_encode($salida);