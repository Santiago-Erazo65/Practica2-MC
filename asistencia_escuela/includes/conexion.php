<?php
$host = "localhost";
$user = "root";      // Usuario predeterminado de MySQL en XAMPP
$pass = "";          // Sin contraseña (si no has establecido una)
$db = "asistencia_escuela";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
