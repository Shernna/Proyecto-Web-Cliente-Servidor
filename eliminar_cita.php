<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cita = $_POST['id_cita'];

    // Eliminar la cita de la base de datos
    $sql = "DELETE FROM citas WHERE id_cita = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_cita);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $conn->close();
}
?>
