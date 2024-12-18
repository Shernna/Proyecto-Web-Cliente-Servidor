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
    <header>
       
    </header>

    <div class="container mt-4">
        <div id="contenedorTitulo">
            <h3>Encuentra profesionales de la salud</h3>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">

                <div id="contenedorMedico">
                    <h3>Dra. Rachel Cortes</h3>
                    <p>Odontologia - Medicina</p>
                    <p>Mi licencia: MED4897 · Colegio de Médicos y Cirujanos de Costa Rica</p>
                    <h6>Servicios:</h6>
                    <p>El precio puede variar dependiendo de la condición del paciente, la clínica y el tratamiento.</p>
                    <p>Consulta: ¢85,000.00</p>
                    <div class="columna">
                        <a href="./Agendar.php">Agendar Cita</a>
                    </div>
                </div>


                <div id="contenedorMedico">
                    <h3>Dr. Adrian Rojas</h3>
                    <p>Dermatologia</p>
                    <p>Mi licencia: MED7885 · Colegio de Médicos y Cirujanos de Costa Rica</p>
                    <h6>Servicios:</h6>
                    <p>El precio puede variar dependiendo de la condición del paciente, la clínica y el tratamiento.</p>
                    <p>Consulta: ¢60,000.00</p>
                    <div class="columna">
                        <a href="./Agendar.php">Agendar Cita</a>
                    </div>
                </div>

                <div id="contenedorMedico">
                    <h3>Dra. Shernna Corrales</h3>
                    <p>Psicologia - Medicina</p>
                    <p>Mi licencia: MED4897 · Colegio de Médicos y Cirujanos de Costa Rica</p>
                    <h6>Servicios:</h6>
                    <p>El precio puede variar dependiendo de la condición del paciente, la clínica y el tratamiento.</p>
                    <p>Consulta: ¢45,000.00</p>
                    <div class="columna">
                        <a href="./Agendar.php">Agendar Cita</a>
                    </div>
                </div>

                <div id="contenedorMedico">
                    <h3>Dr. Alejandro Arguedas</h3>
                    <p>Pediatria</p>
                    <p>Mi licencia: MED7885 · Colegio de Médicos y Cirujanos de Costa Rica</p>
                    <h6>Servicios:</h6>
                    <p>El precio puede variar dependiendo de la condición del paciente, la clínica y el tratamiento.</p>
                    <p>Consulta: ¢40,000.00</p>
                    <div class="columna">
                        <a href="./Agendar.php">Agendar Cita</a>
                    </div>
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