<?php
function mostrarHeader($titulo = "RedAlimento", $cssPath = "../css/alimentos.css") {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($titulo) ?></title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/tablas.css">
        <link rel="stylesheet" href="../css/botones.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/validaciones.css">
    </head>
    <body>
    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                <src class="logo" src="logo.png" alt="RedAlimento">
                <span class="nombre">RedAlimento</span>
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="./../index.html">Inicio</a></li>
                    
                    <li class="submenu">
                        <a href="#" class="desplegable">Formularios <span class="flecha">&#9662;</span></a>
                        <ul class="menu-desplegable">
                            <li><a href="./../frontend/donar.php">Donar</a></li>
                            <li><a href="./../frontend/solicitar.php">Solicitar</a></li>
                        </ul>
                    </li>

                    <li><a href="./../frontend/alimentos.php">Alimentos</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
    <?php
}

function mostrarFooter() {
    ?>
    </main>
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
    <?php
}

function obtenerImagenPorCategoria($categoria) {
    $cat = strtolower(trim($categoria));

    switch ($cat) {
        case 'lacteos':
            return '../src/categorias/lacteos.jpeg';
        case 'carnes_pescados_huevos':
            return '../src/categorias/carne_pescado_huevo.jpeg';
        case 'tuberculos_legumbres_frutossecos':
            return '../src/categorias/tuberculos_legumbres_frutos_secos.jpg';
        case 'verduras_hortalizas':
            return '../src/categorias/verduras_hortalizas.jpg';
        case 'frutas':
            return '../src/categorias/frutas.jpeg';
        case 'pan_pasta_cereales_azucar':
            return '../src/categorias/pasta_pan_cereales.jpeg';
        case 'grasas_aceites_mantequillas':
            return '../src/categorias/grasas_aceites_mantequilla.jpeg';
        default:
            return '../src/categorias/default.png';
    }
}