<?php
include("barranav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio - Plataforma de Citas Médicas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>

	<header class="jumbotron text-center" style="background-image: url('./images/medical-background.jpg');">
		<h1 class="display-4">Bienvenido a Citas Médicas</h1>
		<p class="lead">La plataforma donde puedes agendar tus citas médicas de manera fácil y rápida.</p>
		<a href="./Agendar.php" class="btn btn-success btn-lg mt-3">Agendar una Cita</a>
	</header>


	<div class="container text-center">
		<h4>Descripción de la plataforma</h4>
		<p>
			Una plataforma virtual que permite a los usuarios agendar citas médicas en diferentes especialidades, gestionar su historial y recibir recordatorios de los doctores.
		</p>
		<p>
			Los doctores también pueden gestionar su disponibilidad y ver los historiales de sus pacientes.
		</p>
	</div>


	<div class="container my-5">
		<div class="row text-center">
			<div class="col-md-4">
				<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.suprema.edu.br%2Fckfinder%2Ffiles%2Fespecialidades%2520medicas.png&f=1&nofb=1&ipt=0b4b7ea44a5212ef1777b000481f731fc4aa2099b4a5313655798d57738255c5&ipo=images" alt="Especialidades" class="rounded-circle mb-3">
				<h5>Amplia Variedad de Especialidades</h5>
				<p>Encuentra el especialista adecuado para cada necesidad médica.</p>
			</div>
			<div class="col-md-4">
				<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fzellosaude.app%2Fwp-content%2Fuploads%2F2021%2F04%2Fzello_historiaclinica-scaled.jpg&f=1&nofb=1&ipt=54b174e293ab571d27250fdbcae7cad42a6595e171e1f6b17ea8140d872cc9b2&ipo=images" alt="Historial" class="rounded-circle mb-3">
				<h5>Gestión de Historial Médico</h5>
				<p>Accede a tu historial de citas y mantente informado.</p>
			</div>
			<div class="col-md-4">
				<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fnubidoc.com%2Fwp-content%2Fuploads%2F2023%2F09%2Fque-es-un-recordatorio-de-citas-medicas-y-para-que-sirve.jpg&f=1&nofb=1&ipt=76a8e255bb55ff9210546ab60e5a73736aa2bd57e83c029a9c1e87f3124903a7&ipo=images" alt="Recordatorios" class="rounded-circle mb-3">
				<h5>Recordatorios de Citas</h5>
				<p>Recibe notificaciones para que no olvides tus citas.</p>
			</div>
		</div>
	</div>


    <?php include("footer.php") ?>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>