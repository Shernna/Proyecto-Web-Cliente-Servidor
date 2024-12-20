<?php
include '../barranav.php';

require_once '../controller/medicoController.php';

$controller = new medicoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->editar($_POST)) {
        header('Location: ../PanelMedico.php');
        exit();
    } else {
        echo "Error al actualizar la solicitud.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $medicos = $controller->listar();
    $medico = null;
    while ($row = $medicos->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id'] == $id) {
            $medico = $row;
            break;
        }
    }
} else {
    $medico = null; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil de Médico</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div id="contenedorTitulo">
            <h3>Editar Médicos</h3>
        </div>    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="editar.php" class="was-validated" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $medico['id']; ?>">
                <div class="mb-3">
                    <label for="id_usuario">Id Usuario</label>
                    <input type="number" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo $medico['id_usuario']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $medico['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $medico['apellido']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" class="form-control" name="especialidad" id="especialidad" value="<?php echo $medico['especialidad']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="disponibilidad">Disponibilidad</label>
                    <input type="text" class="form-control" name="disponibilidad" id="disponibilidad" value="<?php echo $medico['disponibilidad']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="licencia">Licencia</label>
                    <input type="text" class="form-control" name="licencia" id="licencia" value="<?php echo $medico['licencia']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="consulta">Consulta</label>
                    <input type="number" class="form-control" name="consulta" id="consulta" value="<?php echo $medico['consulta']; ?>" required>
                </div>
                <button type="submit" id="guardarBtn" >Actualizar</button>
                <a href="http://localhost/Proyecto-Web-Cliente-Servidor/PanelMedico.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>
</html>
