<?php
include 'conexion.php'; // Asumiendo que tu archivo de conexión se llama 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST['id_paciente'];
    $medico = $_POST['medico'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Insertar la cita en la base de datos con estado 'pendiente'
    $sql = "INSERT INTO citas (id_paciente, id_medico, estado, fecha, hora) VALUES (?, ?, 'pendiente', ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiss", $id_paciente, $medico, $fecha, $hora);

        if ($stmt->execute()) {
            header("Location: Agendar.php?status=success");
            exit();
            //echo json_encode(["status" => "success"]);
            
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
