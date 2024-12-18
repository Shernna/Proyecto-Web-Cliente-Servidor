<!DOCTYPE html>
<html lang="es">

<?php
include("head.php");
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $cantidad_personas = $_POST['cantidad_personas'];

    if ($nombre && $fecha && $cantidad_personas) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "
            SELECT * FROM salones s 
            WHERE s.capacidad >= ? 
            AND s.id NOT IN (
                SELECT r.id_salon FROM reservaciones r WHERE r.fecha = ? AND r.estado = 'aprobado'
            ) 
            LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([$cantidad_personas, $fecha]);
        $salon = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($salon) {
            $insert = "INSERT INTO reservaciones (nombre, fecha, cantidad_personas, id_salon) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->execute([$nombre, $fecha, $cantidad_personas, $salon['id']]);
            echo "<script>alert('Reservación creada exitosamente');</script>";

        } else {
            echo "<script>alert('No hay salones disponibles que cumplan con los requisitos.');</script>";

        }
    } else {
        echo "<script>alert('Por favor completa todos los campos.');</script>";
    }
}
?>
<head>
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td {
            border: 1px solid rgb(2, 39, 95);
            color: rgb(2, 39, 95);
            background-color: rgb(136, 173, 230);

            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: rgb(2, 39, 95);
            color:rgb(136, 173, 230);
            padding: 10px;
            border: 1px solid rgb(136, 173, 230);
        }

    </style>
    
</head>

<body>
    <header>
        <?php include("menu.php") ?>
    </header>
    <main>
        <section>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cantidad_personas" class="form-label">Cantidad de Personas</label>
                    <input type="number" name="cantidad_personas" id="cantidad_personas" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </section>
    </main>

    <?php include("footer.php") ?>

</body>

</html>