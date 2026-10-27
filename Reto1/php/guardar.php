<?php
    require 'api.php'; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datosValidados = [
            'alimento' => $_POST['alimento'] ?? '',
            'categoria' => $_POST['categoria'] ?? '',
            'cantidad' => $_POST['cantidad'] ?? '',
            'unidad' => $_POST['unidad'] ?? '',
            'fecha_caducidad' => $_POST['fecha_caducidad'] ?? '',
            'conservacion' => $_POST['conservacion'] ?? '',
            'punto_recogida' => $_POST['punto_recogida'] ?? '',
            'email' => $_POST['email'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? ''
        ];

        if (empty($datosValidados['alimento']) || empty($datosValidados['categoria']) || empty($datosValidados['cantidad'])) {
            echo "Error: Hay campos obligatorios vacios.";
            echo "<a href='./../frontend/donar.php'>Volver al formulario</a>";
            exit;
        }

        $resultado = llamarApi('POST', API_URL, $datosValidados);

        if ($resultado === null) {
            echo "Error: La API de Node.js no esta arrancada (ejecuta npm start).";
        } else {
            echo "<h1>Donacion registrada con exito!</h1>";
            echo "<p>Se ha guardado en la API con el ID: <strong>" . $resultado['id'] . "</strong></p>";
            echo '<br><a href="./../index.html">Volver</a>';
        }
    }
    else {
        header('Location: index.html');
        exit;
    }
?>