<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reservar Cita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
    include("barranav.php");
    ?>
</head>
<body>
    <div class="container mt-4">
        <form id="citaForm" action="procesar_citas.php" method="post" onsubmit="mostrarResumen(event)">
            <div class="mb-3">
                <label for="id_paciente" class="form-label">ID Paciente:</label>
                <input type="number" id="id_paciente" name="id_paciente" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la Cita:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora de la Cita:</label>
                <input type="time" id="hora" name="hora" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="medico" class="form-label">Seleccionar Médico:</label>
                <select id="medico" name="medico" class="form-control" required>
                    <option value="">Seleccionar Médico</option>
                    <?php
                    include 'conexion.php'; 
                    $sql = "SELECT id_medico, especialidad FROM medicos";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_medico'] . "'>" . $row['id_medico'] . " - " . $row['especialidad'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Reservar Cita</button>
            
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
    <?php
        include("footer.php");
    ?>
</html>
