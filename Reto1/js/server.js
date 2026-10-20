const express = require('express');
const app = express();

// Middleware para leer JSON en el cuerpo de las peticiones
app.use(express.json());

// Array global en memoria y contador para los IDs únicos
let registros = [];
let nextId = 1;

// GET /api/registros - Devuelve todos los elementos (con filtro opcional ?texto=...)
app.get('/api/registros', (req, res) => {
    let resultado = registros;
    const texto = req.query.texto;
    
    if (texto) {
        const filtro = texto.toLowerCase();
        resultado = registros.filter(r => 
            Object.values(r).some(val => String(val).toLowerCase().includes(filtro))
        );
    }
    res.status(200).json(resultado);
});

// GET /api/registros/:id - Busca un elemento por su id
app.get('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const registro = registros.find(r => r.id === id);
    
    if (!registro) {
        return res.status(404).json({ error: 'Registro no encontrado' });
    }
    res.status(200).json(registro);
});

// POST /api/registros - Crea un nuevo elemento
app.post('/api/registros', (req, res) => {
    const { alimento, categoria, cantidad, unidad, fecha_caducidad, conservacion, punto_recogida, email, descripcion } = req.body;
    
    // Validación de campos obligatorios
    if (!alimento || !categoria || !cantidad) {
        return res.status(400).json({ error: 'Faltan campos obligatorios (alimento, categoría o cantidad)' });
    }

    const nuevoRegistro = {
        id: nextId++,
        alimento,
        categoria,
        cantidad,
        unidad: unidad || '',
        fecha_caducidad: fecha_caducidad || '',
        conservacion: conservacion || '',
        punto_recogida: punto_recogida || '',
        email: email || '',
        descripcion: descripcion || ''
    };

    registros.push(nuevoRegistro);
    
    // Responde con 201, el objeto creado y la cabecera Location
    res.status(201)
       .header('Location', `/api/registros/${nuevoRegistro.id}`)
       .json(nuevoRegistro);
});

// PUT /api/registros/:id - Reemplaza un elemento existente
app.put('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const index = registros.findIndex(r => r.id === id);
    
    if (index === -1) {
        return res.status(404).json({ error: 'Registro no encontrado' });
    }

    const { alimento, categoria, cantidad, unidad, fecha_caducidad, conservacion, punto_recogida, email, descripcion } = req.body;

    if (!alimento || !categoria || !cantidad) {
        return res.status(400).json({ error: 'Faltan campos obligatorios' });
    }

    registros[index] = {
        id, // Se conserva el id original
        alimento,
        categoria,
        cantidad,
        unidad: unidad || '',
        fecha_caducidad: fecha_caducidad || '',
        conservacion: conservacion || '',
        punto_recogida: punto_recogida || '',
        email: email || '',
        descripcion: descripcion || ''
    };

    res.status(200).json(registros[index]);
});

// Puerto de escucha
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`API corriendo en http://localhost:${PORT}`);
});