<?php
include('../includes/autenticacion.php');
include('../includes/conexion.php');

$asistencias = mysqli_query($conn, "SELECT a.id, e.nombre, e.apellido, c.nombre_clase, c.fecha, a.hora_llegada, a.presente 
                                    FROM asistencias a 
                                    JOIN estudiantes e ON a.estudiante_id = e.id 
                                    JOIN clases c ON a.clase_id = c.id");
?>
<h2>Ver Asistencias</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Estudiante</th><th>Clase</th><th>Fecha</th><th>Hora Llegada</th><th>Presente</th>
    </tr>
    <?php while ($asistencia = mysqli_fetch_assoc($asistencias)): ?>
    <tr>
        <td><?= $asistencia['id'] ?></td>
        <td><?= $asistencia['nombre'] ?> <?= $asistencia['apellido'] ?></td>
        <td><?= $asistencia['nombre_clase'] ?></td>
        <td><?= $asistencia['fecha'] ?></td>
        <td><?= $asistencia['hora_llegada'] ?></td>
        <td><?= $asistencia['presente'] ? 'Presente' : 'Ausente' ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="../dashboard.php">Volver al panel</a>
