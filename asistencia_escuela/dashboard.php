<?php
include('includes/autenticacion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Sistema de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        body {
            padding-top: 56px; /* Espacio para el navbar fijo */
            /*font-family: 'Poppins', sans-serif;*/
        }
        .welcome-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación simplificada -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">
                <i class="bi bi-book"></i> Asistencia Escolar
            </a>
            
            <!-- Menú derecho con perfil -->
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="welcome-header">
            <h2>Bienvenido, <?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario') ?></h2>
            <p class="text-muted">Sistema de gestión escolar</p>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Estudiantes</h5>
                        <p class="card-text text-muted">Gestión de registros estudiantiles</p>
                        <a href="estudiantes/listar.php" class="btn btn-outline-primary">Gestionar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-text display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Clases</h5>
                        <p class="card-text text-muted">Administración de clases</p>
                        <a href="clases/listar.php" class="btn btn-outline-primary">Gestionar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clipboard-plus display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Registrar Asistencias</h5>
                        <p class="card-text text-muted">Registro diario de asistencia</p>
                        <a href="asistencias/registrar.php" class="btn btn-outline-primary">Acceder</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-list-check display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Ver Asistencias</h5>
                        <p class="card-text text-muted">Consulta de registros</p>
                        <a href="asistencias/ver.php" class="btn btn-outline-primary">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>