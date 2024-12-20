<?php
include("barranav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buscar Médicos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>

	
	<div class="container mt-5">
		<h2 class="text-center mb-4">Búsqueda de Médicos y Especialidades</h2>
		<p class="text-center mb-5">Utiliza los filtros a continuación para encontrar médicos por especialidad y ubicación.</p>


		<form id="busquedaForm" class="bg-light p-4 rounded shadow-sm" onsubmit="Buscar(event)">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="especialidad">Especialidad</label>
					<select id="especialidad" name="especialidad" class="form-control" required>
						<option value="">Seleccione una especialidad</option>
						<option value="cardiologia">Cardiología</option>
						<option value="dermatologia">Dermatología</option>
						<option value="pediatria">Pediatría</option>
						<option value="psicologia">Psicología</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="ubicacion">Ubicación</label>
					<select id="ubicacion" name="ubicacion" class="form-control" required>
						<option value="">Seleccione una ubicación</option>
						<option value="san_jose">San José</option>
						<option value="heredia">Heredia</option>
						<option value="alajuela">Alajuela</option>
						<option value="cartago">Cartago</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Buscar</button>
		</form>
	</div>

	<div class="container mt-5">
		<h3 class="text-center">Resultados</h3>
		<div id="resultados" class="bg-white p-4 rounded shadow-sm mt-3">
			<div id="listaMedicos" class="row">

			</div>
		</div>
	</div>

    <?php include("footer.php") ?>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="./js/script.js"></script>
</body>
</html>
