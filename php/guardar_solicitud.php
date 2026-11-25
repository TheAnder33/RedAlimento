<?php
    require_once 'api.php';
    require_once 'funciones.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ../frontend/solicitar.php');
        exit;
    }
    mostrarHeader("RedAlimento - Listado de Alimentos");
?>
<h1>RESULTADO</h1>

<?php
    $alimentoID = isset($_POST['alimento_id']) ? trim(strip_tags($_POST['alimento_id'])) : "";
    $cantidad = isset($_POST['cantidad']) ? trim(strip_tags($_POST['cantidad'])) : "";
    $solicitante = isset($_POST['solicitante']) ? trim(strip_tags($_POST['solicitante'])) : "";
    $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : "";
    $importancia = isset($_POST['importancia']) ? trim(strip_tags($_POST['importancia'])) : "1";
    $observaciones = isset($_POST['observaciones']) ? trim(strip_tags($_POST['observaciones'])) : "";

    $hayError = false;

    if ($alimentoID === "") {
        echo "<p class='error'>No se ha seleccionado ningún alimento.</p>";
        $hayError = true;
    } elseif (!filter_var($alimentoID, FILTER_VALIDATE_INT)) {
        echo "<p class='error'>El identificador del alimento no es válido.</p>";
        $hayError = true;
    }

    if ($cantidad === "") {
        echo "<p class='error'>No se ha introducido la cantidad.</p>";
        $hayError = true;
    } elseif (!is_numeric($cantidad) || $cantidad <= 0) {
        echo "<p class='error'>La cantidad introducida no es un número válido (debe ser mayor que 0).</p>";
        $hayError = true;
    }

    if ($solicitante === "") {
        echo "<p class='error'>No se ha introducido el nombre del solicitante.</p>";
        $hayError = true;
    } elseif (is_numeric($solicitante)) {
        echo "<p class='error'>El nombre del solicitante no puede ser un número.</p>";
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
        echo '<div class="btn-container"><a href="../frontend/solicitar.php" class="btn">Volver</a></div>';
    } else {
        $datos = [
            'alimento_id' => (int)$alimentoID,
            'cantidad' => (float)$cantidad,
            'solicitante' => $solicitante,
            'email' => $email,
            'importancia' => (int)$importancia,
            'observaciones' => $observaciones
        ];

        $resultado = llamarApi(
            'POST',
            'http://localhost:3000/api/solicitudes',
            $datos
        );

        if (!is_array($resultado) || !isset($resultado['id'])) {
            echo "<h2>Error al registrar la solicitud</h2>";
            if (is_array($resultado) && isset($resultado['error'])) {
                echo '<p class="error">' . htmlspecialchars($resultado['error']) . '</p>';
            } else {
                echo '<p class="error">Error: La API de Node.js no está arrancada o no responde.</p>';
            }
            echo '<div class="btn-container"><a href="../frontend/solicitar.php" class="btn">Volver</a></div>';
        } else {
            echo "<div class='success'>";
            echo "<h1>Solicitud registrada correctamente</h1>";
            echo "<p>Número de solicitud: <strong>" . (int)$resultado['id'] . "</strong></p>";
            echo "<p>Importancia asignada: <strong>" . (int)$resultado['importancia'] . "</strong></p>";
            echo "<p>Estado: <strong>Pendiente</strong></p>";
            echo "</div>";
            echo '<div class="btn-container"><a href="../index.html" class="btn">Volver</a></div>';
        }
    }
?>
<?php
    mostrarFooter();
?>