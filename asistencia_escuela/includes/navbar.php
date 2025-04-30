<?php
// Verifica si hay una sesión activa para personalizar el navbar
$usuarioLogueado = isset($_SESSION['usuario_id']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
    <div class="container">
        <!-- Logo o nombre del sistema -->
        <a class="navbar-brand" href="../dashboard.php">
            <i class="bi bi-book"></i> Asistencia Escolar
        </a>

        <!-- Botón para móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú principal -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if ($usuarioLogueado): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../estudiantes/listar.php">
                            <i class="bi bi-people"></i> Estudiantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../clases/listar.php">
                            <i class="bi bi-journal-text"></i> Clases
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../asistencias/registrar.php">
                            <i class="bi bi-check-circle"></i> Asistencias
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Menú derecho (login/logout) -->
            <ul class="navbar-nav ms-auto">
                <?php if ($usuarioLogueado): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-danger" href="../logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
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
    </div>
</nav>