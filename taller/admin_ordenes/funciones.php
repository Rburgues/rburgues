<?php

    function subir_imagen(){
        if (isset($_FILES["imagen_usuario"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_imagen2(){
        if (isset($_FILES["imagen_usuario2"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario2"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario2"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }
    
     function subir_imagen3(){
        if (isset($_FILES["imagen_usuario3"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario3"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario3"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }
    
     function subir_imagen4(){
        if (isset($_FILES["imagen_usuario4"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario4"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario4"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_imagen($id_usuario){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imagen FROM usuarios WHERE id = '$id_usuario'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen"];
        }
    }

    function obtener_nombre_imagen2($id_usuario){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imagen2 FROM usuarios WHERE id = '$id_usuario'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen2"];
        }
    }
    
    function obtener_nombre_imagen3($id_usuario){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imagen3 FROM usuarios WHERE id = '$id_usuario'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen3"];
        }
    }


function obtener_nombre_imagen4($id_usuario){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imagen4 FROM usuarios WHERE id = '$id_usuario'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen4"];
        }
    }


    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }
    
    
    

    