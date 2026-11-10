<?php
function mostrarHeader($titulo = "RedAlimento", $cssPath = "../css/alimentos.css") {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($titulo) ?></title>
        <link rel="stylesheet" href="<?= htmlspecialchars($cssPath) ?>">
    </head>
    <body class="body-alimentos">

    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                <img class="logo" src="logo.png" alt="RedAlimento">
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