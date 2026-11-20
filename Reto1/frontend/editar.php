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
        mostrarHeader("RedAlimento - Error");
        echo "<h2>Error 404: Alimento no encontrado</h2>";
        echo '<p><a href="alimentos.php" class="btn">Volver al listado</a></p>';
        mostrarFooter();
        exit;
    }
    
    // La API guarda la fecha como AAAA-MM-DD; en el formulario se muestra como DD/MM/AAAA
    $fechaMostrar = '';
    if (!empty($alimento['fecha_caducidad'])) {
        $d = DateTime::createFromFormat('Y-m-d', $alimento['fecha_caducidad']);
        $fechaMostrar = $d ? $d->format('d/m/Y') : $alimento['fecha_caducidad'];
    }

    mostrarHeader("RedAlimento - Modificar Alimento");
?>

<h2>Modificar Alimento (ID: <?= $alimento['id'] ?>)</h2>

<form action="../php/actualizar.php?id=<?= $alimento['id'] ?>" method="POST">
    <p>
        <label>Alimento:</label>
        <input type="text" name="alimento" value="<?= htmlspecialchars($alimento['alimento']) ?>">
    </p>
    <p>
        <label for="categoria_select"><b>Categoría:</b></label>
        <select id="categoria_select" name="categoria">
            <option value="" disabled selected>Selecciona una categoría...</option>
            <option value="lacteos" <?= ($alimento['categoria'] ?? '') === 'lacteos' ? 'selected' : '' ?>>Lácteos (leche, queso, yogur)</option>
            <option value="carnes_pescados_huevos" <?= ($alimento['categoria'] ?? '') === 'carnes_pescados_huevos' ? 'selected' : '' ?>>Carnes, pescados y huevos</option>
            <option value="tuberculos_legumbres_frutossecos" <?= ($alimento['categoria'] ?? '') === 'tuberculos_legumbres_frutossecos' ? 'selected' : '' ?>>Tubérculos, legumbres y frutos secos</option>
            <option value="verduras_hortalizas" <?= ($alimento['categoria'] ?? '') === 'verduras_hortalizas' ? 'selected' : '' ?>>Verduras y hortalizas</option>
            <option value="frutas" <?= ($alimento['categoria'] ?? '') === 'frutas' ? 'selected' : '' ?>>Frutas</option>
            <option value="pan_pasta_cereales_azucar" <?= ($alimento['categoria'] ?? '') === 'pan_pasta_cereales_azucar' ? 'selected' : '' ?>>Pan, pasta, cereales y azúcar</option>
            <option value="grasas_aceites_mantequillas" <?= ($alimento['categoria'] ?? '') === 'grasas_aceites_mantequillas' ? 'selected' : '' ?>>Grasas, aceites y mantequillas</option>
        </select>
    </p>
    <p>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?= htmlspecialchars($alimento['cantidad']) ?>">
    </p>
    <p>
        <label><b>Unidad:</b></label>
        <div class="radio-group">
            <label class="radio-option">
                <input type="radio" id="kg" name="unidad" value="kg"> kg
            </label>
            <label class="radio-option">
                <input type="radio" id="unidades" name="unidad" value="unidades"> Unidades
            </label>
            <label class="radio-option">
                <input type="radio" id="paquetes" name="unidad" value="paquetes"> Paquetes
            </label>
        </div>
    </p>
    <p>
        <label>Fecha de Caducidad (DD/MM/AAAA):</label>
        <input type="text" name="fecha_caducidad" value="<?= htmlspecialchars($fechaMostrar) ?>" placeholder="25/12/2026" maxlength="10" autocomplete="off">
    </p>
    <p>
        <label><b>Tipo de conservación:</b></label>
        <div class="radio-group">
            <label class="radio-option">
                <input type="radio" id="ambiente" name="conservacion" value="ambiente"> Ambiente
            </label>
            <label class="radio-option">
                <input type="radio" id="refrigerado" name="conservacion" value="refrigerado"> Refrigerado
            </label>
            <label class="radio-option">
                <input type="radio" id="congelado" name="conservacion" value="congelado"> Congelado
            </label>
        </div>
    </p>
    <p>
        <label>Punto de Recogida:</label>
        <input type="text" name="punto_recogida" value="<?= htmlspecialchars($alimento['punto_recogida']) ?>">
    </p>
    <p>
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($alimento['email']) ?>">
    </p>
    <p>
        <label>Descripción:</label>
        <textarea name="descripcion"><?= htmlspecialchars($alimento['descripcion']) ?></textarea>
    </p>
    <div class="form-acciones">
        <input type="submit" value="Guardar Cambios" class="btn-edit" style="border: none; cursor: pointer;">
    </div>
    <div>
        <a href="alimentos.php" class="btn-cancelar-centrado">Cancelar</a>
    </div>
</form>

<?php
    mostrarFooter();
?>