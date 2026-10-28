<?php 

require_once 'api.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/solicitar.php');
    exit;
}
$alimentoID = filter_input(
    INPUT_POST,
    'alimento_id',
    FILTER_VALIDATE_INT
);
$cantidad = filter_input(
    INPUT_POST,
    'cantidad',
    FILTER_VALIDATE_FLOAT
);

$solicitante = trim($_POST['solicitante'] ?? '');
$email = trim($_POST['email'] ?? '');
$observaciones = trim($_POST['observaciones'] ?? '');


if(
    !$alimentoID ||
    !$cantidad ||
    $cantidad <= 0 ||
    $solicitante === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    echo '<h2>Error: datos incorrectos</h2>';
    echo '<a href="../frontend/solicitar.php">Volver</a>';
    exit;
}

$datos = [
    'alimento_id' => $alimentoID,
    'cantidad' => $cantidad,
    'solicitante' => $solicitante,
    'email' => $email,
    'observaciones' => $observaciones
];

$resultado = llamarApi(
    'POST',
    'http://localhost:3000/api/solicitudes',
    $datos
);

if(!is_array($resultado) || !isset($resultado['id'])) {
    echo '<h2>Error al registrar la solicitud</h2>';

    if (is_array($resultado) && isset($resultado['error'])) {
        echo '<p>' . htmlspecialchars($resultado['error']) . '</p>';
    }
    echo '<a href="../frontend/solicitar.php">Volver</a>';

    exit;
}
    echo '<h1>Solicitud registrada correctamente</h1>';
    echo '<p> Numero de solicitud: ' . (int)$resultado['id'] . '</p>';
    echo '<p> Estado: Pendiente </p>';
    echo '<a href="../index.html">Volver</a>';


?>