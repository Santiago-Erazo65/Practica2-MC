<?php
include('../includes/autenticacion.php');
include('../includes/conexion.php');

$resultado = mysqli_query($conn, "SELECT * FROM clases");
?>
<h2>Clases</h2>
<a href="crear.php">Agregar Clase</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Fecha</th><th>Hora Inicio</th><th>Hora Fin</th><th>Acciones</th>
    </tr>
    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
    <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= $fila['nombre_clase'] ?></td>
        <td><?= $fila['fecha'] ?></td>
        <td><?= $fila['hora_inicio'] ?></td>
        <td><?= $fila['hora_fin'] ?></td>
        <td>
            <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
            <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar esta clase?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="../dashboard.php">Volver al panel</a>
