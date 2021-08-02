<?php 
    session_start();
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_equipos";
    $respuesta =  mysqli_query($conexion, $sql);
?>

<table class="table table-dark table-striped" id="tablaEquipos">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Modelo</th>
        <th>Numero de Serie</th>
        <th>Capacidad</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php 
            while( $mostrar = mysqli_fetch_array($respuesta)) { 
                
        ?>
        <tr>
            <td><?php echo $idEquipo = $mostrar['id_equipo']; ?></td>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['modelo']; ?></td>
            <td><?php echo $mostrar['serie']; ?></td>
            <td><?php echo $mostrar['capacidad']; ?></td>
            <td><?php echo $mostrar['descripcion']; ?></td>
            <td>
            <?php
                $ext = $mostrar['extension'];
                $imagen = '';
                
                if ($ext == "jpg" || $ext == "JPG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="verFull.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                } else if ($ext == "png" || $ext == "PNG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="verFull.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                }else if ($ext == "jpeg" || $ext == "JPEG") {
                    $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre_archivo'] . ' width="50px" height="50px">';
                    echo '<a href="verFull.php?nombre=' . $mostrar['nombre_archivo'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                }
            ?>
            
            </td>
            <td>
                <form action="actualizar.php" method="POST">
                    <input type="text" hidden name="idEquipo" value="<?php echo $mostrar['id_equipo']?>">
                    <button class="btn btn-warning">Editar <span class="far fa-edit"></span></button>
                </form>
            </td>
            <td>
                <form action="servidor/eliminarEquipo.php" method="POST">
                    <input type="text" hidden name="idEquipo" value="<?php echo $idEquipo; ?>">
                    <button class="btn btn-danger">Eliminar <span class="fas fa-trash"></span></button>
                </form>
            </td>

        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaEquipos').DataTable();
	});
</script>
