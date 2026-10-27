const express = require('express');
const app = express();

app.use(express.json());

let registros = [];
let nextId = 1;

app.get('/api/registros', (req, res) => {
    let resultado = registros;
    const texto = req.query.texto;
    
    if (texto) {
        const filtro = texto.toLowerCase();
        resultado = registros.filter(r => 
            Object.values(r).some(val => String(val).toLowerCase().includes(filtro))
        );aaaa
    }
    res.status(200).json(resultado);
});

app.get('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const registro = registros.find(r => r.id === id);
    
    if (!registro) {
        return res.status(404).json({ error: 'Registro no encontrado' });
    }
    res.status(200).json(registro);
});

app.post('/api/registros', (req, res) => {
    const { alimento, categoria, cantidad, unidad, fecha_caducidad, conservacion, punto_recogida, email, descripcion } = req.body;
    
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
    
    res.status(201)
       .header('Location', `/api/registros/${nuevoRegistro.id}`)
       .json(nuevoRegistro);
});

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
        id,
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

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`API corriendo en http://localhost:${PORT}`);
});