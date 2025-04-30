<?php
include('../includes/conexion.php');
$id = $_GET['id'];
$resultado = mysqli_query($conn, "SELECT * FROM clases WHERE id = $id");
$clase = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_clase'];
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    mysqli_query($conn, "UPDATE clases SET nombre_clase='$nombre', fecha='$fecha', hora_inicio='$hora_inicio', hora_fin='$hora_fin' WHERE id=$id");
    header("Location: listar.php");
}
?>

<h2>Editar Clase</h2>
<form method="post">
    Nombre de la Clase: <input type="text" name="nombre_clase" value="<?= $clase['nombre_clase'] ?>" required><br>
    Fecha: <input type="date" name="fecha" value="<?= $clase['fecha'] ?>" required><br>
    Hora de Inicio: <input type="time" name="hora_inicio" value="<?= $clase['hora_inicio'] ?>" required><br>
    Hora de Fin: <input type="time" name="hora_fin" value="<?= $clase['hora_fin'] ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
<a href="listar.php">Volver</a>
