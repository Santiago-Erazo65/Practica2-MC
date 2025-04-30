<?php
include('../includes/conexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_clase'];
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];

    $sql = "INSERT INTO clases (nombre_clase, fecha, hora_inicio, hora_fin) 
            VALUES ('$nombre', '$fecha', '$hora_inicio', '$hora_fin')";
    mysqli_query($conn, $sql);
    header("Location: listar.php");
}
?>

<h2>Agregar Clase</h2>
<form method="post">
    Nombre de la Clase: <input type="text" name="nombre_clase" required><br>
    Fecha: <input type="date" name="fecha" required><br>
    Hora de Inicio: <input type="time" name="hora_inicio" required><br>
    Hora de Fin: <input type="time" name="hora_fin" required><br>
    <input type="submit" value="Guardar">
</form>
<a href="listar.php">Volver</a>
