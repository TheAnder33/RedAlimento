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
    <title>RedAlimento - Solicitar Alimentos</title>
    <link rel="stylesheet" href="../css/solicitar.css">
</head>
<body>

<header class="main-header">
    <div class="header-container">
        <div class="logo-container">
            <img class="logo" src="logo.png" alt="RedAlimento">
            <span class="nombre">RedAlimento</span>
        </div>
    </div>
</header>
    
<div class="container">
    <h1>Solicitar alimento</h1>

    <p>Selecciona un alimento disponible y rellena tus datos.</p>

    <?php if (empty($alimentos)): ?>
        <p>No hay alimentos disponibles.</p>
    <?php else : ?>

    <form action="../php/guardar_solicitud.php" method="POST">
        <p>
            <label for="alimento_id">Alimento:</label><br>
            <select name="alimento_id" id="alimento_id">
                <option value="">Selecciona un alimento</option>
                <?php foreach ($alimentos as $item): ?>
                    <option value="<?= (int)$item['id'] ?>" <?=(int)$item['id'] === $seleccionado ?  'selected' : '' ?>>
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
            <input type="number" name="cantidad" id="cantidad" min="0.01" step="0.01">
        </p>
        <p>
            <label for="solicitante">Nombre del solicitante:</label><br>
            <input type="text" name="solicitante" id="solicitante">
        </p>
        <p>
            <label for="email">Correo Electrónico:</label><br>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="observaciones">Observaciones:</label><br>
            <textarea name="observaciones" id="observaciones" rows="4"
            ></textarea>
        </p>

        <p>
            <button type="submit">Enviar solicitud</button>
        </p>
    </form>

    <?php endif; ?>

    <p style="margin-top: 20px;">
        <a href="../index.html">Cancelar</a>
    </p>
</div>
<footer>
        <h3>RedAlimento</h3>
        <p>
            Proyecto educativo relacionado con los
            Objetivos de Desarrollo Sostenible.
        </p>
        <p>
            ODS 2 - Hambre cero |
            ODS 12 - Consumo responsable
        </p>
        <p>2026 - RedAlimento</p>
    </footer>
</body>
</html>