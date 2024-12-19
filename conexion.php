<?php
$servername = "localhost";
$username = "root";
$password = "Estrella.21";
$dbname = "citas_medicas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>