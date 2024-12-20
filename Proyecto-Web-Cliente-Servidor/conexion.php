<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citas_medicas";
$port = 3307;


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>

