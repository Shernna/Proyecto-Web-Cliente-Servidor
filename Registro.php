<?php
include("barranav.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Proyecto</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>
	<body>
		
		<div class="container">
			<h2 class="text-center mb-4">Registrarse</h2>
			<p class="text-center mb-5">Por favor llenar la información para registrarse.</p>
			<hr>

			<div class="col-md-12">
				<label for="email" ><b>Correo</b></label>
				<input class="form-control" type="text" placeholder="Ingrese el correo" name="email" required>
			</div>

			<div class="col-md-12">
				<label for="psw"><b>Contraseña</b></label>
				<input class="form-control"  type="password" placeholder="Ingrese la contraseña" name="psw" required>
			</div>
			
			<div class="col-md-12">
				<label for="psw-repeat"><b>Repita la contraseña</b></label>
				<input class="form-control"  type="password" placeholder="Repita la contraseña" name="psw-repeat" required>
			</div>

			<div class="col-md-12">
				<label><b>Rol</b></label><br/>
				<input type="radio" id="paciente" name="rol" value="1" checked>
				<label for="paciente">Paciente</label><br>
				<input type="radio" id="medico" name="rol" value="2">
				<label for="medico">Médico</label><br>
			</div>

			<div id="divPaciente">
				<div class="col-md-12">
					<label for="nacimiento" ><b>Fecha de nacimiento</b></label>
					<input class="form-control" type="date" placeholder="Ingrese la fecha de nacimiento" name="nacimiento">
				</div>
				<div class="col-md-12">
					<label for="telefono" ><b>Teléfono</b></label>
					<input class="form-control" type="text" placeholder="Ingrese su teléfono" name="telefono">
				</div>
			</div>
			
			<div id="divMedico" style="display: none;">
				<div class="col-md-12">
					<label for="especialidad"><b>Especialidad</b></label>
					<select id="especialidad" name="especialidad" class="form-control">
						<option value="">Seleccione una especialidad</option>
						<option value="cardiologia">Cardiología</option>
						<option value="dermatologia">Dermatología</option>
						<option value="pediatria">Pediatría</option>
						<option value="psicologia">Psicología</option>
					</select>
				</div>
				<div class="col-md-12">
					<label for="disponibilidad" ><b>Disponibilidad</b></label>
					<textarea class="form-control" type="text" placeholder="Ingrese su disponibilidad" name="disponibilidad" maxlength="255"></textarea>
				</div>
			</div>

			<div class="row clearfix">
			  <button type="button" class="col-md-6 btn-danger" onclick="Volver()">Cancelar</button>
			  <button type="submit" class="col-md-6 btn-primary">Registrarse</button>
			</div>
	  </div>
	  <?php include("footer.php") ?>

		<script src="./js/script.js"></script>
	</body>
</html>
