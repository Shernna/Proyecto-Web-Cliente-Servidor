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
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Contacto</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                            <div class="alert alert-success" role="alert">
                                Enviado exitosamente.
                            </div>
                        <?php endif; ?>
                        <form action="procesar_contacto.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje:</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container mt-5">
        <h1 class="text-center mb-4">Nuestros Administradores - Contáctanos</h1>


        <div class="admin-section mb-4 p-4 border rounded shadow-sm">
            <h2>Administrador 1</h2>
            <p><strong>Nombre:</strong> Adrian Rojas</p>
            <p><strong>Email:</strong> adrian.rojas@administrador.com</p>
            <p><strong>Teléfono:</strong> 8888888</p>
        </div>

        <div class="admin-section mb-4 p-4 border rounded shadow-sm">
            <h2>Administrador 2</h2>
            <p><strong>Nombre:</strong> Rachel Cortes</p>
            <p><strong>Email:</strong> rachel.cortes@administrador.com</p>
            <p><strong>Teléfono:</strong> 8888888</p>
        </div>

        <div class="admin-section mb-4 p-4 border rounded shadow-sm">
            <h2>Administrador 3</h2>
            <p><strong>Nombre:</strong> Alejandro Arguedas</p>
            <p><strong>Email:</strong> alejandro.arguedas@administrador.com</p>
            <p><strong>Teléfono:</strong> 8888888</p>
        </div>

        <div class="admin-section mb-4 p-4 border rounded shadow-sm">
            <h2>Administrador 4</h2>
            <p><strong>Nombre:</strong> Shernna Corrales</p>
            <p><strong>Email:</strong> shernna.corrales@administrador.com</p>
            <p><strong>Teléfono:</strong> 8888888</p>
        </div>
    </div>

    


    <?php include("footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>

</html>