<?php
include 'conexion.php'; // Asumiendo que tu archivo de conexión se llama 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST['id_paciente'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $medico = $_POST['medico'];

    // Insertar la cita en la base de datos con estado 'pendiente'
    $sql = "INSERT INTO citas (id_paciente, id_medico, estado, fecha, hora) VALUES (?, ?, 'pendiente', ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiss", $id_paciente, $medico, $fecha, $hora);

        if ($stmt->execute()) {
            echo "Cita reservada con éxito.";
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
