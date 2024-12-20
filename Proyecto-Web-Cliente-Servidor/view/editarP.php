<?php
include '../barranav.php';

require_once '../controller/pacienteController.php';

$controller = new pacienteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->editarP($_POST)) {
        header('Location: ../pacientes.php');
        exit();
    } else {
        echo "Error al actualizar la solicitud.";
    }
}

if (isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];
    $pacientes = $controller->listar();
    $paciente = null;
    while ($row = $pacientes->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id_paciente'] == $id_paciente) {
            $paciente = $row;
            break;
        }
    }
} else {
    $paciente = null; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil de Pacientes</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div id="contenedorTitulo">
            <h3>Editar Paciente</h3>
        </div>    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="editarP.php" class="was-validated" enctype="multipart/form-data">
                <input type="hidden" name="id_paciente" value="<?php echo $paciente['id_paciente']; ?>">
                <div class="mb-3">
                    <label for="id_usuario">Id Usuario</label>
                    <input type="number" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo $paciente['id_usuario']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $paciente['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $paciente['apellido']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                    <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $paciente['fecha_nacimiento']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $paciente['telefono']; ?>" required>
                </div>
                
                <button type="submit" id="guardarBtn" >Actualizar</button>
                <a href="http://localhost/Proyecto-Web-Cliente-Servidor/pacientes.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>
</html>
