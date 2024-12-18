
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	

	<div class="container mt-5">
		<h2 class="text-center mb-4">Iniciar Sesión</h2>
		<form>
			<div class="mb-3">
				<label for="uname" class="form-label"><b>Usuario</b></label>
				<input type="text" class="form-control" placeholder="Ingrese el usuario" name="uname" required>
			</div>

			<div class="mb-3">
				<label for="psw" class="form-label"><b>Contraseña</b></label>
				<input type="password" class="form-control" placeholder="Ingrese la contraseña" name="psw" required>
			</div>

			<button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
		</form>
	</div>


	<div class="container mt-3" style="background-color:#f1f1f1">
		<div class="text-center">
			<span class="psw">¿No tiene cuenta? <a href="./Registro.php">¡Crear cuenta aquí!</a></span>
		</div>
	</div>

    <?php include("footer.php") ?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
