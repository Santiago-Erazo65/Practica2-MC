<?php
// Iniciar sesión primero
session_start();
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $matricula = $_POST['matricula'];

    $sql = "INSERT INTO estudiantes (nombre, apellido, matricula) VALUES ('$nombre', '$apellido', '$matricula')";
    mysqli_query($conn, $sql);
    header("Location: listar.php");
    exit(); // Añadido para seguridad
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estudiante | Sistema de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            padding-top: 80px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php include('../includes/navbar.php'); ?>
    
    <div class="container">
        <div class="card shadow form-container">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-person-plus"></i> Agregar Estudiante</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Código</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="listar.php" class="btn btn-outline-secondary me-md-2">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>