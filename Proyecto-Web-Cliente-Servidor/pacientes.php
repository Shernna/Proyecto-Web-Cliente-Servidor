
<?php
include("barranav.php");
require_once "controller/pacienteController.php";

$controller = new pacienteController();
$pacientes = $controller->listar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "controller/pacienteController.php";
    $controller = new pacienteController();
    if ($controller->crearP($_POST)) {
        header('Location: ../pacientes.php');
        exit();
    } else {
        echo "Error al guardar el paciente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>


    <div class="container mt-4">
        <div class="mb-3 text-center">
            <a href="http://localhost/Proyecto-Web-Cliente-Servidor/view/crearP.php">
                <button id="AgregarPaciente" type="button" class="btn btn-primary w-100">Agregar Paciente</button>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    <h3>Pacientes</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Paciente</th>
                                    <th>Nombre</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($row = $pacientes->fetch(PDO::FETCH_ASSOC)) { 
                                    echo "<tr>";
                                    echo "<td>" . $row['id_paciente'] . "</td>";
                                    echo "<td>" . $row['nombre'] . " " . $row['apellido'] . "</td>";
                                    echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                                    echo "<td>" . $row['telefono'] . "</td>";
                                    echo "<td>
                                            <div >
                                                <a class='btn btn-primary' href='http://localhost/Proyecto-Web-Cliente-Servidor/view/editarP.php?id_paciente=" . $row['id_paciente'] . "'>Editar Paciente</a>
                                                <a class='btn btn-danger' href='http://localhost/Proyecto-Web-Cliente-Servidor/view/eliminarP.php?id_paciente=" . $row['id_paciente'] . "'>Eliminar</a>
                                            </div>
                                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>

</html>