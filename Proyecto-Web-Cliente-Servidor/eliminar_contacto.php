<?php
include 'conexion.php'; // Asumiendo que tu archivo de conexión se llama 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contacto = $_POST['id_contacto'];

    // Preparar la consulta SQL
    $sql = "DELETE FROM contacto WHERE id_contacto = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_contacto);

        if ($stmt->execute()) {
            echo "Contacto eliminado correctamente.";
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
