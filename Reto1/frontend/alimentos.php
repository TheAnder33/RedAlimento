<?php
require_once './../php/api.php';
require_once './../php/funciones.php';

$alimentos = llamarApi('GET', API_URL);

if (!is_array($alimentos)) {
    $alimentos = [];
}

mostrarHeader("RedAlimento - Listado de Alimentos");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedAlimento - Listado de Alimentos</title>
    <link rel="stylesheet" href="../css/alimentos.css">
</head>
<body class="body-alimentos">
    <main>
        <h2>Listado de Alimentos Donados</h2>

        <?php if (empty($alimentos)): ?>
            <p>No hay alimentos registrados en este momento.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre / Descripción</th>
                        <th>Tipo / Categoría</th>
                        <th>Cantidad</th>
                        <th>Fecha de Caducidad</th>
                        <th>Acciones</th>
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
                            <td>
                                <div class="acciones-container">
                                    <a class="btn-solicitar" href="solicitar.php?alimento_id=<?= (int)$item['id']?>">Solicitar</a>
                                    <a class="btn-edit" href="editar.php?id=<?= $item['id'] ?>">Modificar</a>
                                    <a class="btn-delete" href="../php/eliminar.php?id=<?= $item['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este alimento?');">Eliminar</a>
                                </div>  
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    <?php
        mostrarFooter();
    ?>
</body>
</html>