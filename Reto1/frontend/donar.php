<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>RedAlimento</title>
</head>
<body>

<h1>DONACIÓN</h1>

<form action="./../php/guardar.php" method="post">
    <p>
        <b><label for="alimento">Nombre del alimento: </label></b><br>
        <input type="text" id="alimento" name="alimento">
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
        <b><label for="cantidad">Cantidad: </label></b><br>
        <input type="numer" id="cantidad" name="cantidad">
    </p>
    <p>
        <b>Unidad:</b><br>
        
        <input type="radio" id="kg" name="unidad" value="kg"> 
        <label for="kg">kg</label><br>

        <input type="radio" id="unidades" name="unidad" value="unidades"> 
        <label for="unidades">unidades</label><br>

        <input type="radio" id="paquetes" name="unidad" value="paquetes"> 
        <label for="paquetes">paquetes</label>
    </p>
    <p>
        <label for="fecha_caducidad"><b>Fecha de caducidad:</b></label><br>
        <input type="date" id="fecha_caducidad" name="fecha_caducidad">
    </p>
    <p>
        <b>Tipo de conservación:</b><br>
        
        <input type="radio" id="ambiente" name="conservacion" value="ambiente"> 
        <label for="ambiente">Ambiente</label><br>

        <input type="radio" id="refrigerado" name="conservacion" value="refrigerado"> 
        <label for="refrigerado">Refrigerado</label><br>

        <input type="radio" id="congelado" name="conservacion" value="congelado"> 
        <label for="congelado">Congelado</label>
    </p>
     <p>
        <b><label for="punto_recogida">Punto de recogida: </label></b><br>
        <input type="text" id="punto_recogida" name="punto_recogida">
    </p>
    <p>
        <b><label for="email">Email: </label></b><br>
        <input type="text" id="email" name="email">
    </p>
    <p>
        <label for="descripcion"><b>Descripción:</b></label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Escribe una breve descripción del alimento..."></textarea>
    </p>
    <p>
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Reset" name="Reset">
        <button type="button" onclick="location.href='../index.html'">Cancelar</button>
    </p>
</form>

</body>
</html>