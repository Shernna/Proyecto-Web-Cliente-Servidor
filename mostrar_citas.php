<?php
    include("barranav.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Citas</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Cita</th>
                                    <th>ID Paciente</th>
                                    <th>ID Médico</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'conexion.php'; 
                                $sql = "SELECT id_cita, id_paciente, id_medico, fecha, hora, estado FROM citas";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id_cita'] . "</td>";
                                        echo "<td>" . $row['id_paciente'] . "</td>";
                                        echo "<td>" . $row['id_medico'] . "</td>";
                                        echo "<td>" . $row['fecha'] . "</td>";
                                        echo "<td>" . $row['hora'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        echo "<td>
                                              <button class='btn btn-success' onclick='cambiarEstado(" . $row['id_cita'] . ", \"confirmada\")'>Confirmar</button>
                                              <button class='btn btn-warning' onclick='cambiarEstado(" . $row['id_cita'] . ", \"pendiente\")'>Pendiente</button>
                                              <button class='btn btn-danger' onclick='eliminarCita(" . $row['id_cita'] . ")'>Cancelar</button>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No hay citas.</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function cambiarEstado(idCita, nuevoEstado) {
            $.post('cambiar_estado.php', { id_cita: idCita, estado: nuevoEstado }, function(response) {
                location.reload();
            });
        }

        function eliminarCita(idCita) {
            $.post('eliminar_cita.php', { id_cita: idCita }, function(response) {
                location.reload();
            });
        }
    </script>
    <?php
        include("footer.php");
    ?>
</body>
</html>
