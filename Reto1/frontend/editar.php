<?php
require_once '../php/api.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: alimentos.php');
    exit;
}

$alimento = llamarApi('GET', API_URL . '/' . $id);

if (!is_array($alimento) || isset($alimento['error'])) {
    echo "<h2>Error: Alimento no encontrado</h2>";
    echo '<a href="alimentos.php">Volver al listado</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Alimento</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Modificar Alimento (ID: <?= $alimento['id'] ?>)</h2>

    <form action="../php/actualizar.php?id=<?= $alimento['id'] ?>" method="POST">
        
        <label>Alimento:</label>
        <input type="text" name="alimento" value="<?= htmlspecialchars($alimento['alimento']) ?>" required><br><br>

        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?= htmlspecialchars($alimento['categoria']) ?>" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?= htmlspecialchars($alimento['cantidad']) ?>" required><br><br>

        <label>Unidad:</label>
        <input type="text" name="unidad" value="<?= htmlspecialchars($alimento['unidad']) ?>"><br><br>

        <label>Fecha de Caducidad:</label>
        <input type="date" name="fecha_caducidad" value="<?= htmlspecialchars($alimento['fecha_caducidad']) ?>"><br><br>

        <label>Conservación:</label>
        <input type="text" name="conservacion" value="<?= htmlspecialchars($alimento['conservacion']) ?>"><br><br>

        <label>Punto de Recogida:</label>
        <input type="text" name="punto_recogida" value="<?= htmlspecialchars($alimento['punto_recogida']) ?>"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($alimento['email']) ?>"><br><br>

        <label>Descripción:</label>
        <textarea name="descripcion"><?= htmlspecialchars($alimento['descripcion']) ?></textarea><br><br>

        <input type="submit" value="Guardar Cambios">
        <a href="alimentos.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>