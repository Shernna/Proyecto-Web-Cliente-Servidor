<?php
include '../barranav.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../controller/pacienteController.php";
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
    <title>Agregar Paciente</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
        <div id="contenedorTitulo">
            <h3>Agregar Paciente</h3>
        </div>
    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="crearP.php" class="was-validated" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required/>
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" required/>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"  required/>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"  required/>
                </div>
                
                <button type="submit" id="guardarBtn" class="btn btn-primary">Guardar</button>
                <a href="pacientes.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
<?php include("../footer.php") ?>

</html>
