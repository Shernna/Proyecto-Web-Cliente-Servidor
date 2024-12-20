<?php
include 'conexion.php'; // Asumiendo que tu archivo de conexión se llama 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        if ($stmt->execute()) {
            // Redireccionar con el estado de éxito
            header("Location: contacto.php?status=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
