<?php
    session_start();
    include "agregar.php";
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['numeroSerie'];
    $capacidad = $_POST['capacidad'];
    $descripcion = $_POST['descripcion'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $extension = explode(".", $nombre_archivo);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDeServidor = "../archivos/";

    //subir un archivo
    //move_uploaded_file nos retorna un 1 si se subio y un 0 si no se subio

    if (move_uploaded_file($rutaTemporal, $rutaDeServidor . $nombre_archivo)) {
        $insertarEnBD = agregar($nombre, $nombre_archivo, $modelo, $serie,
        $capacidad, $descripcion, $extension);
        if ($insertarEnBD) {
            $_SESSION['operacion'] = "insert";
        } else {
            $_SESSION['operacion'] = "error";
        }
    } else {
        $_SESSION['operacion'] = "error";
    }

    header("location:../index.php");