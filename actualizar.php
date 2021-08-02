<?php

    $idEquipo = $_POST['idEquipo'];

    //traemos la conexion
    include "servidor/conexion.php";
    $conexion = conexion();
    //debemos obtener los datos asociados

    $sql = "SELECT id_equipo, 
                    nombre, 
                    modelo,
                    serie,
                    capacidad,
                    descripcion 
            FROM t_equipos 
            WHERE id_equipo = '$idEquipo'";
    $respuesta = mysqli_query($conexion, $sql);

    $datos = mysqli_fetch_array($respuesta);
?>

<?php include "header.php"; ?>

    
    <!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-2">
        <div class="card-body p-5">
            <h1 class="fw-light">Actualización de dispositivos de hardware</h1>
            <p class="lead">
            <div class="row">
                <div class="col-sm-12">
                    <form action="servidor/actualizarEquipo.php" enctype="multipart/form-data" method="POST">
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <input type="text" name="idEquipo" value="<?php echo $datos['id_equipo'] ?>" hidden>
                                <label for="nombre">Nombre del dispositivo</label>
                                <input type="text" id="nombre" name="nombre" required class="form-control"  value="<?php echo $datos['nombre'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" required class="form-control"  value="<?php echo $datos['modelo'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="serie">Numero de serie</label>
                                <input type="text" name="serie" id="serie"class="form-control" value="<?php echo $datos['serie'] ?>" pattern="[0-9]+">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label for="capacidad">Capacidad</label>
                                <input type="text" name="capacidad" id="capacidad" class="form-control" value="<?php echo $datos['capacidad'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $datos['descripcion'] ?>">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-sm-12">
                    <div id="tablaEquipo"></div>
                </div>
            </div>
            </p>
        </div>
    </div>
</div>



<?php include "footer.php"; ?>
