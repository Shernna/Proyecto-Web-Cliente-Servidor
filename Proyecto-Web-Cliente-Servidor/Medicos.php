<?php
include("barranav.php");
require_once "controller/medicoController.php";

$controller = new medicoController();
$medicos = $controller->listar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "controller/medicoController.php";
    $controller = new medicoController();
    if ($controller->crear($_POST)) {
        header('Location: Medicos.php');
        exit();
    } else {
        echo "Error al guardar el médico.";
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
        <div id="contenedorTitulo">
            <h3>Encuentra profesionales de la salud</h3>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <?php while ($row = $medicos->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div id="contenedorMedico">
                        <h3>Dr. <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></h3>
                        <p><?php echo $row['especialidad']; ?></p>
                        <p><?php echo $row['licencia']; ?></p>
                        <h6><?php echo $row['disponibilidad']; ?></h6>
                        <p>El precio puede variar dependiendo de la condición del paciente, la clínica y el tratamiento.</p>
                        <p><?php echo $row['consulta']; ?></p>
                        <div class="columna">
                            <a href="./Agendar.php">Agendar Cita</a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>

    <?php include("footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>