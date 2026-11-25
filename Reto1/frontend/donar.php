<?php
    require_once './../php/funciones.php';

    mostrarHeader("RedAlimento - Listado de Alimentos");
?>
<h1>DONACIÓN</h1>

<form action="./../php/guardar.php" method="post">
    <p>
        <b><label for="alimento">Nombre del alimento: </label></b>
        <input type="text" id="alimento" name="alimento">
    </p>
    <p>
        <label for="categoria_select"><b>Categoría:</b></label>
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
        <b><label for="cantidad">Cantidad: </label></b>
        <input type="number" id="cantidad" name="cantidad">
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
        <label for="fecha_caducidad"><b>Fecha de caducidad (DD/MM/AAAA):</b></label>
        <input type="text" id="fecha_caducidad" name="fecha_caducidad" placeholder="25/12/2026" maxlength="10" autocomplete="off">
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
        <b><label for="punto_recogida">Punto de recogida: </label></b>
        <input type="text" id="punto_recogida" name="punto_recogida">
    </p>
    <p>
        <b><label for="email">Email: </label></b>
        <input type="text" id="email" name="email">
    </p>
    <p>
        <label for="descripcion"><b>Descripción:</b></label>
        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Escribe una breve descripción del alimento..."></textarea>
    </p>
    <div class="form-acciones">
        <input type="submit" value="Enviar" name="enviar" class="btn-solicitar" style="border: none; cursor: pointer;">
        <input type="reset" value="Limpiar" name="Reset" class="btn-delete" style="border: none; cursor: pointer;">
    </div>
    <div>
        <a href="../index.html" class="btn-cancelar-centrado">Cancelar</a>
    </div>
</form>
<?php
        mostrarFooter();
?>