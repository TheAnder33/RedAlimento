<?php 
    require_once '../php/api.php';
    require_once '../php/funciones.php';
    $alimentos = llamarApi('GET', API_URL);

    if (!is_array($alimentos)) {
        $alimentos = [];
    }
    $seleccionado = (int)($_GET['alimento_id'] ?? 0);

    mostrarHeader("RedAlimento - Listado de Alimentos");
?>

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
        <label for="importancia">Nivel de importancia / urgencia (1 al 10):</label>
        <div class="range-container">
            <input type="range" name="importancia" id="importancia" min="1" max="10" value="5" 
                   oninput="document.getElementById('valImportancia').innerText = this.value">
            <span id="valImportancia" class="range-value-badge">5</span>
        </div>
    </p>
    <p>
        <label for="observaciones">Observaciones:</label><br>
        <textarea name="observaciones" id="observaciones" rows="4"
        ></textarea>
    </p>

    <div class="form-acciones">
        <button type="submit" class="btn-solicitar" style="border: none; cursor: pointer;">Enviar solicitud</button>
    </div>
    <div>
        <a href="../index.html" class="btn-cancelar-centrado">Cancelar</a>
    </div>
</form>
<?php endif; ?>
<?php
    mostrarFooter();
?>