<?php
include('../includes/autenticacion.php');
include('../includes/conexion.php');
$id = $_GET['id'];
$resultado = mysqli_query($conn, "SELECT * FROM estudiantes WHERE id = $id");
$est = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $matricula = $_POST['matricula'];
    mysqli_query($conn, "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', matricula='$matricula' WHERE id=$id");
    header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante | Sistema de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            padding-top: 80px;
        }
        .table-responsive {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Estudiante</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $est['nombre'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $est['apellido'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Código</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="<?= $est['matricula'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-arrow-repeat"></i> Actualizar
                    </button>
                    <a href="listar.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>