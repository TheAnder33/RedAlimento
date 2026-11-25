# Banco de Alimentos

Aplicación web para gestionar un banco de alimentos: las personas pueden **donar** alimentos, **solicitarlos**, **editar** los datos y **consultar** lo que hay disponible.

## Funcionalidades

- **Donar**: registrar nuevos alimentos en el banco.
- **Solicitar**: pedir alimentos disponibles.
- **Editar**: modificar los datos de un alimento ya registrado.
- **Mostrar**: ver el listado de alimentos y el detalle de cada uno.
- **Elementos multimedia**: imágenes, audios, vídeos y animaciones con `canvas`.
- **Diseño responsive**: la web se adapta a distintos tamaños de pantalla.

## Tecnologías

- HTML y CSS
- Canvas
- PHP (páginas dinámicas, formularios y validaciones en servidor)
- Node.js con Express (lógica del banco de alimentos y API REST)
- Apache (despliegue)

## Requisitos

- [Node.js](https://nodejs.org/) y npm
- Apache con PHP

## Instalación y arranque

1. Clona o descarga el proyecto y entra en la carpeta `Reto1`.
2. Instala las dependencias:

   ```bash
   npm install
   ```

3. Inicia la aplicación:

   ```bash
   npm start
   ```

4. Para las páginas PHP, despliega la carpeta del proyecto en Apache y abre `index.html` desde el navegador.

## Estructura del proyecto

```
Retos/
└── Reto1/
    ├── css/                    Estilos
    ├── frontend/               Páginas PHP de la interfaz
    │   ├── alimentos.php       Listado de alimentos
    │   ├── donar.php           Formulario de donación
    │   ├── editar.php          Edición de un alimento
    │   ├── solicitar.php       Formulario de solicitud
    │   └── ver.php             Detalle de un alimento
    ├── js/
    │   ├── canvas.js           Elementos con canvas
    │   └── server.js           Servidor Node.js y API REST con Express
    ├── php/                    Lógica y validaciones en servidor
    │   ├── actualizar.php
    │   ├── api.php
    │   ├── eliminar.php
    │   ├── funciones.php
    │   ├── guardar_solicitud.php
    │   └── guardar.php
    ├── src/
    │   ├── audios/
    │   ├── entregables/        Kanban, mapa mental y prototipado
    │   ├── img/
    │   └── videos/
    ├── index.html              Página de inicio
    ├── package.json
    └── .gitignore
```

## Entregables

En `src/entregables` se encuentran el kanban del proyecto (`kanban_proyecto_web.png`), el mapa mental y el prototipado.
