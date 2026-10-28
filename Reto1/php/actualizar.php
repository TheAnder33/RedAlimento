<?php
require_once 'api.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_GET['id'])) {
    header('Location: ../frontend/alimentos.php');
    exit;
}

$id = $_GET['id'];

$datosActualizados = [
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

if (empty($datosActualizados['alimento']) || empty($datosActualizados['categoria']) || empty($datosActualizados['cantidad'])) {
    echo "Error: Hay campos obligatorios vacíos.";
    echo "<br><a href='../frontend/editar.php?id=$id'>Volver</a>";
    exit;
}

$resultado = llamarApi('PUT', API_URL . '/' . $id, $datosActualizados);

if ($resultado === null || isset($resultado['error'])) {
    echo "<h2>Error al actualizar el registro</h2>";
    if (isset($resultado['error'])) {
        echo "<p>" . htmlspecialchars($resultado['error']) . "</p>";
    }
    echo "<a href='../frontend/alimentos.php'>Volver al listado</a>";
} else {
    echo "<h1>¡Alimento modificado con éxito!</h1>";
    echo "<br><a href='../frontend/alimentos.php'>Volver al listado de alimentos</a>";
}
?>