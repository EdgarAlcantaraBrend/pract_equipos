<?php

    include "conexion.php";

    function agregar($nombre, $nombre_archivo, $modelo, $serie,
                                    $capacidad, $descripcion, $extension) {
        $conexion = conexion();
        $sql = "INSERT INTO t_equipos (nombre,
                                        nombre_archivo,
                                        modelo,
                                        serie,
                                        capacidad,
                                        descripcion,
                                        extension) 
                VALUES ('$nombre',
                        '$nombre_archivo', 
                        '$modelo',
                        '$serie',
                        '$capacidad',
                        '$descripcion',
                        '$extension')";
        $respuesta = mysqli_query($conexion, $sql);

        return $respuesta;
    }