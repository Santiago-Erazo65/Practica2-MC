<?php
include('../includes/autenticacion.php');
include('../includes/conexion.php');

$estudiantes = mysqli_query($conn, "SELECT * FROM estudiantes");
$clases = mysqli_query($conn, "SELECT * FROM clases");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estudiante_id = $_POST['estudiante_id'];
    $clase_id = $_POST['clase_id'];
    $hora_llegada = $_POST['hora_llegada'];
    $presente = $_POST['presente'];

    $sql = "INSERT INTO asistencias (estudiante_id, clase_id, hora_llegada, presente) 
            VALUES ('$estudiante_id', '$clase_id', '$hora_llegada', '$presente')";
    mysqli_query($conn, $sql);
    header("Location: ver.php");
}
?>

<h2>Registrar Asistencia</h2>
<form method="post">
    Estudiante:
    <select name="estudiante_id" required>
        <?php while ($estudiante = mysqli_fetch_assoc($estudiantes)): ?>
            <option value="<?= $estudiante['id'] ?>"><?= $estudiante['nombre'] ?> <?= $estudiante['apellido'] ?></option>
        <?php endwhile; ?>
    </select><br>

    Clase:
    <select name="clase_id" required>
        <?php while ($clase = mysqli_fetch_assoc($clases)): ?>
            <option value="<?= $clase['id'] ?>"><?= $clase['nombre_clase'] ?> - <?= $clase['fecha'] ?></option>
        <?php endwhile; ?>
    </select><br>

    Hora de Llegada: <input type="time" name="hora_llegada" required><br>
    Asistencia:
    <select name="presente" required>
        <option value="1">Presente</option>
        <option value="0">Ausente</option>
    </select><br>

    <input type="submit" value="Registrar">
</form>
<a href="../dashboard.php">Volver al panel</a>
