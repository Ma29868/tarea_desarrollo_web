<?php
    //Datos de conexión
    $host = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "registro_usuario";

    //Crear el objeto conexion a la BD
    $conexion = new mysqli($host, $usuario, $contraseña, $bd);

    //Verificar errores de conexión
    if ($conexion -> connect_error) {
       die("Conexion fallida: " . $conexion -> connect_error); //error
    }

?>