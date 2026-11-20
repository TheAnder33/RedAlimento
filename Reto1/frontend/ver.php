<?php
    require_once '../php/api.php';
    require_once '../php/funciones.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        header('Location: alimentos.php');
        exit;
    }

    $registros = llamarApi('GET', API_URL);
    $alimento = null;

    if (is_array($registros)) {
        foreach ($registros as $item) {
            if (isset($item['id']) && $item['id'] == $id) {
                $alimento = $item;
                break;
            }
        }
    }
    if (!$alimento) {
        mostrarHeader("RedAlimento - Error");
        echo "<h2>Error 404: Alimento no encontrado</h2>";
        echo '<p><a href="alimentos.php" class="btn">Volver al listado</a></p>';
        mostrarFooter();
        exit;
    }

    $categoriaActual = $alimento['tipo'] ?? $alimento['categoria'] ?? '';
    $imagenRuta = obtenerImagenPorCategoria($categoriaActual);

    mostrarHeader("RedAlimento - Detalle del Alimento");
?>
<h1>Detalle del Alimento (ID: <?= htmlspecialchars($alimento['id']) ?>)</h1>

<div class="detalle-contenido">
    <div class="detalle-info">
        <p><strong>Nombre del alimento:</strong> <?= htmlspecialchars($alimento['alimento']) ?></p>
        <p><strong>Categoría / Tipo:</strong> <?= htmlspecialchars($categoriaActual ?: '-') ?></p>
        <p><strong>Cantidad disponible:</strong> <?= htmlspecialchars($alimento['cantidad']) ?> <?= htmlspecialchars($alimento['unidad']) ?></p>
        <p><strong>Fecha de caducidad:</strong> <?= htmlspecialchars($alimento['fecha_caducidad'] ?? $alimento['caducidad'] ?? '-') ?></p>
        <p><strong>Tipo de conservación:</strong> <?= htmlspecialchars($alimento['conservacion'] ?? '-') ?></p>
        <p><strong>Punto de recogida:</strong> <?= htmlspecialchars($alimento['punto_recogida'] ?? '-') ?></p>
        <p><strong>Email de contacto:</strong> <?= htmlspecialchars($alimento['email'] ?? '-') ?></p>
        <p><strong>Descripción:</strong> <?= htmlspecialchars($alimento['descripcion'] ?? 'Sin descripción') ?></p>
    </div>

    <div class="detalle-imagen-card">
        <img src="<?= htmlspecialchars($imagenRuta) ?>" 
            alt="Categoría" 
            style="width: 160px; height: 160px; object-fit: contain;"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
        <span style="display:none; color: #94a3b8; font-size: 3rem;">   </span>
        <p class="detalle-categoria-titulo">
            <?= htmlspecialchars($categoriaActual ?: 'General') ?>
        </p>
    </div>
</div>
<div class="detalle-acciones">
    <a href="alimentos.php" class="btn">Volver al listado</a>
</div>
<?php
    mostrarFooter();
?>