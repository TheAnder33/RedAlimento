<?php
require_once './../php/api.php';

$alimentos = llamarApi('GET', API_URL);

if (!is_array($alimentos)) {
    $alimentos = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedAlimento - Listado de Alimentos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<header class="main-header">
     <div class="header-container">
        <div class="logo-container">
            <img class="logo" src="logo.png" alt="RedAlimento" >
            <spam class="nombre">RedAlimento</spam>
        </div>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="./../index.html">Inicio</a></li>
                <li><a href="./../frontend/donar.php">Registrar Alimento</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>
    <main>
        <h2>Listado de Alimentos Donados</h2>

        <?php if (empty($alimentos)): ?>
            <p>No hay alimentos registrados en este momento.</p>
        <?php else: ?>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre / Descripción</th>
                        <th>Tipo / Categoría</th>
                        <th>Cantidad</th>
                        <th>Fecha de Caducidad</th>
                        <th>Acción</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alimentos as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['id'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($item['alimento'] ?? 'Sin nombre') ?></td>
                            <td><?= htmlspecialchars($item['tipo'] ?? $item['categoria'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($item['cantidad'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($item['caducidad'] ?? $item['fecha_caducidad'] ?? '-') ?></td>
                            <td><a href="solicitar.php?alimento_id=<?= (int)$item['id']?>">Solicitar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

</body>
</html>