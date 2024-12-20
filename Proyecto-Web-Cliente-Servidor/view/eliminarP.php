<?php
include '../barranav.php';
require_once "../controller/pacienteController.php";
$controller = new pacienteController();

$id_paciente = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_paciente'])) {
    $id_paciente = $_POST['id_paciente'];
}

if (!$id_paciente || !filter_var($id_paciente, FILTER_VALIDATE_INT)) {
    echo "ID no recibido o inválido.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->eliminarP($id_paciente)) {
        header('Location: ../pacientes.php');
        exit();
    } else {
        echo "Error al eliminar la solicitud.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Eliminar</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>
<body>
    <div id="contenedorTitulo">
        <h3>Eliminar Médico</h3>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="eliminarP.php" class="was-validated" enctype="multipart/form-data">
                <!-- Usamos htmlspecialchars para proteger contra ataques XSS -->
                <input type="hidden" name="id_paciente" value="<?php echo htmlspecialchars($id_paciente); ?>">
                <div class="mb-3">
                    <p>¿Estás seguro de que deseas eliminar esta solicitud?</p>
                </div>
                <button type="submit" id="guardarBtn" class="delete-btn btn btn-danger">Eliminar</button>
                <button type="button" id="crearBtn" onclick="window.location.href='../pacientes.php';">Cancelar</button>

            </form>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>
</html>
