<?php
include('../includes/conexion.php');

$id = $_GET['id'];

// Primero eliminar las asistencias relacionadas
mysqli_query($conn, "DELETE FROM asistencias WHERE estudiante_id = $id");

// Luego eliminar el estudiante
if (mysqli_query($conn, "DELETE FROM estudiantes WHERE id = $id")) {
    $_SESSION['mensaje'] = [
        'texto' => 'Estudiante eliminado correctamente',
        'tipo' => 'success'
    ];
} else {
    $_SESSION['mensaje'] = [
        'texto' => 'Error al eliminar estudiante: ' . mysqli_error($conn),
        'tipo' => 'danger'
    ];
}

header("Location: listar.php");
exit();
?>