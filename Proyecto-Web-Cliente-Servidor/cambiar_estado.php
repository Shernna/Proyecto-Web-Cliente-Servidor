<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cita = $_POST['id_cita'];
    $estado = $_POST['estado'];

    // Preparar la consulta SQL para actualizar el estado de la cita
    $sql = "UPDATE citas SET estado = ? WHERE id_cita = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $estado, $id_cita);

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
