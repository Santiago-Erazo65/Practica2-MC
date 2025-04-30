<?php
include('../includes/autenticacion.php');
include('../includes/conexion.php');

$resultado = mysqli_query($conn, "SELECT * FROM estudiantes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes | Sistema de Asistencia</title>
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
    <?php include('../includes/navbar.php'); ?> <!-- Opcional: Barra de navegación común -->
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-people-fill"></i> Lista de Estudiantes</h5>
                <a href="crear.php" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Agregar Estudiante
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Código</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td><?= $fila['id'] ?></td>
                                <td><?= $fila['nombre'] ?></td>
                                <td><?= $fila['apellido'] ?></td>
                                <td><?= $fila['matricula'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="../dashboard.php" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>