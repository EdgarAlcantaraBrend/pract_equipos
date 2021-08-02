<?php
    session_start();
    include "conexion.php";
    $conexion = conexion();
    $idEquipo = $_POST['idEquipo'];

    $sql = "SELECT nombre_archivo FROM t_equipos WHERE id_equipo = '$idEquipo' ";
    $respuesta = mysqli_query($conexion, $sql);
    $nombreArchivo = mysqli_fetch_row($respuesta)[0];

    $rutaDeArchivo = "../archivos/" . $nombreArchivo;



    $sql = "DELETE FROM t_equipos WHERE id_equipo = '$idEquipo'";
    $respuesta = mysqli_query($conexion, $sql);

    if ($respuesta) {
        if (unlink($rutaDeArchivo)) {
            $_SESSION['operacion'] = "delete";
        } else {
            $_SESSION['operacion'] = "error2";
        }
    } else {
        $_SESSION['operacion'] = "error2";
    }

    header("location:../index.php");