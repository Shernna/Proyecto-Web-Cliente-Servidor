<?php
include("barranav.php");
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
        <form id="citaForm" onsubmit="mostrarResumen(event)">
            <div class="mb-3">
                <label for="identificacion" class="form-label">Número de Identificación:</label>
                <input type="text" id="identificacion" name="identificacion" class="form-control" required><br><br>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required><br><br>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" required><br><br>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" id="edad" name="edad" class="form-control" min="0" required><br><br>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la Cita:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required><br><br>
            </div>

            <button type="submit" class="btn btn-primary">Reservar Cita</button>
        </form>
    </div>


    <div id="resumenModal" class="modal" tabindex="-1" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resumen de la Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="resumenCita"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal()">Cerrar</button>
                </div>
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