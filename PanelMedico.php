
<?php
include("barranav.php");
require_once "controller/medicoController.php";

$controller = new medicoController();
$medicos = $controller->listar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "controller/medicoController.php";
    $controller = new medicoController();
    if ($controller->crear($_POST)) {
        header('Location: ../PanelMedico.php');
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
        <div class="mb-3 text-center">
            <a href="http://localhost/Proyecto-Web-Cliente-Servidor/view/crear.php">
                <button id="AgregarMedico" type="button" class="btn btn-primary w-100">Agregar Médico</button>
            </a>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <?php while ($row = $medicos->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div id="contenedorMedico">
                        <h3><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></h3>
                        <div class="columna">
                            <a href="http://localhost/Proyecto-Web-Cliente-Servidor/view/editar.php?id=<?php echo $row['id']; ?>">Editar Médico</a>
                            <a href="http://localhost/Proyecto-Web-Cliente-Servidor/mostrar_citas.php">Gestionar Citas</a>
                            <a href="http://localhost/Proyecto-Web-Cliente-Servidor/view/eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>

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

</body>

</html>