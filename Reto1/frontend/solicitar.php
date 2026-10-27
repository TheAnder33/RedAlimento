<?php 
    require_once '../php/api.php';
    $alimentos = llamarApi('GET', API_URL);

    if (!is_array($alimentos)) {
        $alimentos = [];
    }
    $seleccionado = (int)($_GET['alimento_id'] ?? 0);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar alimentos</title>
</head>
<body>
    
    <h1>Solicitar alimento</h1>

    <p>Selecciona un alimento disponible y rellena tus datos.</p>

    <?php if (empty($alimentos)): ?>
        <p>No hay alimentos disponibles.</p>
    <?php else : ?>
    

    <form action="../php/guardar_solicitud.php" method="POST">
        <p>
            <label for="alimento_id">Alimento:<label><br>
            <select name="alimento_id" id="alimento_id" required>
                <option value="">Selecciona un alimento</option>
                <?php foreach ($alimentos as $item): ?>
                    <option 
                        value="<?= (int)$item['id'] ?>"
                        <?=(int)$item['id'] === $seleccionado ?  'selected' : '' ?>
                    >
                        <?= htmlspecialchars($item['alimento']) ?> 
                        -
                        <?= htmlspecialchars($item['cantidad']) ?>
                        <?= htmlspecialchars($item['unidad']) ?>
                        disponibles
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="cantidad">Cantidad solicitada:</label><br>
            <input 
                type="number"
                name= "cantidad"
                id= "cantidad"
                min= "0.01"
                step = "0.01"
                required
            >
        </p>
        <p>
            <label for="solicitante"> Nombre del solicitante:</label><br>
            <input
                    type="text"
                    name="solicitante"
                    id="solicitante"
                    required
            >
        </p>
        <p>
            <label for="email">Correo Electronico:</label><br>
            <input
                type="email"
                name="email"
                id="email"
                required
            >
        </p>
        <p>
            <label for="observaciones">Observaciones:</label><br>
            <textarea
                name="observaciones"
                id="observaciones"
                rows="4"
                cols="40"
            ></textarea>
        </p>

        <button type="submit">Enviar solicitud</button>
    </form>

    <?php endif; ?>

    <p>
        <a href="../index.html">Volver</a>
    </p>
</body>
</html>