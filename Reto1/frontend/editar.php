<?php
    require_once '../php/api.php';
    require_once '../php/funciones.php';

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
    mostrarHeader("RedAlimento - Listado de Alimentos");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RedAlimento - Modificar Alimento</title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body>
    <div>
        <h2>Modificar Alimento (ID: <?= $alimento['id'] ?>)</h2>

        <form action="../php/actualizar.php?id=<?= $alimento['id'] ?>" method="POST">
            <p>
                <label>Alimento:</label><br>
                <input type="text" name="alimento" value="<?= htmlspecialchars($alimento['alimento']) ?>">
            </p>
        <p>
                <label for="categoria_select"><b>Categoría:</b></label><br>
                <select id="categoria_select" name="categoria">
                    <option value="" disabled selected>Selecciona una categoría...</option>
                    <option value="lacteos">Lácteos (leche, queso, yogur)</option>
                    <option value="carnes_pescados_huevos">Carnes, pescados y huevos</option>
                    <option value="tuberculos_legumbres_frutossecos">Tubérculos, legumbres y frutos secos</option>
                    <option value="verduras_hortalizas">Verduras y hortalizas</option>
                    <option value="frutas">Frutas</option>
                    <option value="pan_pasta_cereales_azucar">Pan, pasta, cereales y azúcar</option>
                    <option value="grasas_aceites_mantequillas">Grasas, aceites y mantequillas</option>
                </select>
            </p>
            <p>
                <label>Cantidad:</label><br>
                <input type="number" name="cantidad" value="<?= htmlspecialchars($alimento['cantidad']) ?>">
            </p>
            <p>
                <label>Unidad:</label><br>
                <input type="text" name="unidad" value="<?= htmlspecialchars($alimento['unidad']) ?>">
            </p>
            <p>
                <label>Fecha de Caducidad:</label><br>
                <input type="date" name="fecha_caducidad" value="<?= htmlspecialchars($alimento['fecha_caducidad']) ?>">
            </p>
            <p>
                <label>Conservación:</label><br>
                <input type="text" name="conservacion" value="<?= htmlspecialchars($alimento['conservacion']) ?>">
            </p>
            <p>
                <label>Punto de Recogida:</label><br>
                <input type="text" name="punto_recogida" value="<?= htmlspecialchars($alimento['punto_recogida']) ?>">
            </p>
            <p>
                <label>Email:</label><br>
                <input type="text" name="email" value="<?= htmlspecialchars($alimento['email']) ?>">
            </p>
            <p>
                <label>Descripción:</label><br>
                <textarea name="descripcion"><?= htmlspecialchars($alimento['descripcion']) ?></textarea>
            </p>
            <p>
                <input type="submit" value="Guardar Cambios">
                <a href="alimentos.php"><button type="button">Cancelar</button></a>
            </p>
        </form>
    </div>
    <?php
        mostrarFooter();
    ?>
</body>
</html>