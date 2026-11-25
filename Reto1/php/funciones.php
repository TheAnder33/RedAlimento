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
            <a href="./../index.html"><img class="logo" src="./../src/img/logo.jpeg" alt="RedAlimento"></a>
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
    <footer class="site-footer">
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

        <div class="audio-footer-izq" aria-label="Reproductor de música">
            <audio controls preload="metadata">
                <source src="./../src/audios/lo-fi_musica.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
            </audio>
        </div>
    </footer>
    </body>
    </html>
    <?php
}

function obtenerImagenPorCategoria($categoria) {
    $cat = strtolower(trim($categoria));

    switch ($cat) {
        case 'lacteos':
            return '../src/img/categorias/lacteos.jpeg';
        case 'carnes_pescados_huevos':
            return '../src/img/categorias/carne_pescado_huevo.jpeg';
        case 'tuberculos_legumbres_frutossecos':
            return '../src/img/categorias/tuberculos_legumbres_frutos_secos.jpg';
        case 'verduras_hortalizas':
            return '../src/img/categorias/verduras_hortalizas.jpg';
        case 'frutas':
            return '../src/img/categorias/frutas.jpeg';
        case 'pan_pasta_cereales_azucar':
            return '../src/img/categorias/pasta_pan_cereales.jpeg';
        case 'grasas_aceites_mantequillas':
            return '../src/img/categorias/grasas_aceites_mantequilla.jpeg';
        default:
            return '../src/img/categorias/default.png';
    }
}