<?php
    require_once 'api.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_GET['id'])) {
        header('Location: ../frontend/alimentos.php');
        exit;
    }

    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Alimento</title>
    <link rel="stylesheet" href="./../css/validaciones.css">
</head>
<body>
    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                <img src="./../frontend/img/logo.png" alt="RedAlimento" class="logo">
                <span class="nombre">RedAlimento</span>
            </div>
        </div>
    </header>

    <div class="resultado-box">
        <h1>RESULTADO</h1>

        <?php
            $alimento        = isset($_POST['alimento']) ? trim(strip_tags($_POST['alimento'])) : "";
            $categoria       = isset($_POST['categoria']) ? trim(strip_tags($_POST['categoria'])) : "";
            $cantidad        = isset($_POST['cantidad']) ? trim(strip_tags($_POST['cantidad'])) : "";
            $unidad          = isset($_POST['unidad']) ? trim(strip_tags($_POST['unidad'])) : "";
            $fecha_caducidad = isset($_POST['fecha_caducidad']) ? trim(strip_tags($_POST['fecha_caducidad'])) : "";
            $conservacion    = isset($_POST['conservacion']) ? trim(strip_tags($_POST['conservacion'])) : "";
            $punto_recogida  = isset($_POST['punto_recogida']) ? trim(strip_tags($_POST['punto_recogida'])) : "";
            $email           = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : "";
            $descripcion     = isset($_POST['descripcion']) ? trim(strip_tags($_POST['descripcion'])) : "";

            $hayError = false;

            if ($alimento === "") {
                echo "<p class='error'>No se ha introducido el nombre del alimento.</p>";
                $hayError = true;
            } elseif (is_numeric($alimento)) {
                echo "<p class='error'>El nombre del alimento no puede ser un número.</p>";
                $hayError = true;
            }

            if ($categoria === "") {
                echo "<p class='error'>No se ha indicado la categoría.</p>";
                $hayError = true;
            }

            if ($cantidad === "") {
                echo "<p class='error'>No se ha introducido la cantidad.</p>";
                $hayError = true;
            } elseif (!is_numeric($cantidad) || $cantidad <= 0) {
                echo "<p class='error'>La cantidad introducida no es un número válido (debe ser mayor que 0).</p>";
                $hayError = true;
            }

            if ($unidad === "") {
                echo "<p class='error'>No se ha indicado la unidad de medida.</p>";
                $hayError = true;
            }

            if ($fecha_caducidad === "") {
                echo "<p class='error'>No se ha introducido la fecha de caducidad.</p>";
                $hayError = true;
            }

            if ($conservacion === "") {
                echo "<p class='error'>No se ha indicado el método de conservación.</p>";
                $hayError = true;
            }

            if ($punto_recogida === "") {
                echo "<p class='error'>No se ha indicado el punto de recogida.</p>";
                $hayError = true;
            }

            if ($email === "") {
                echo "<p class='error'>Tiene que introducir su email.</p>";
                $hayError = true;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class='error'>El formato del email no es válido.</p>";
                $hayError = true;
            }

            if ($hayError) {
                echo '<div class="btn-container"><a href="../frontend/editar.php?id=' . $id . '" class="btn">Volver al formulario</a></div>';
            } else {
                $datosActualizados = [
                    'alimento' => $alimento,
                    'categoria' => $categoria,
                    'cantidad' => $cantidad,
                    'unidad' => $unidad,
                    'fecha_caducidad' => $fecha_caducidad,
                    'conservacion' => $conservacion,
                    'punto_recogida' => $punto_recogida,
                    'email' => $email,
                    'descripcion' => $descripcion
                ];

                $resultado = llamarApi('PUT', API_URL . '/' . $id, $datosActualizados);

                if ($resultado === null || isset($resultado['error'])) {
                    echo "<h2>Error al actualizar el registro</h2>";
                    if (isset($resultado['error'])) {
                        echo "<p class='error'>" . htmlspecialchars($resultado['error']) . "</p>";
                    } else {
                        echo "<p class='error'>Error: La API de Node.js no está arrancada o no responde.</p>";
                    }
                    echo '<div class="btn-container"><a href="../frontend/alimentos.php" class="btn">Volver al listado</a></div>';
                } else {
                    echo "<div class='success'>";
                    echo "<h1>¡Alimento modificado con éxito!</h1>";
                    echo "</div>";
                    echo '<div class="btn-container"><a href="../frontend/alimentos.php" class="btn">Volver al listado de alimentos</a></div>';
                }
            }
        ?>
    </div>

</body>
</html>