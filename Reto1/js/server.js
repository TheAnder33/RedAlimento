const express = require('express');
const app = express();

app.use(express.json());

app.set('json spaces', 2);

let registros = [];
let nextId = 1;
let solicitudes = [];
let nextSolicitudID  = 1;

function reindexarRegistros() {
    registros.forEach((item, index) => {
        item.id = index + 1;
    });
    nextId = registros.length + 1;
}

app.get('/api/registros', (req, res) => {
    let resultado = registros;
    const texto = req.query.texto;
    
    if (texto) {
        const filtro = texto.toLowerCase();
        resultado = registros.filter(r => 
            Object.values(r).some(val => String(val).toLowerCase().includes(filtro))
        );
    }
    const categoria = req.query.categoria;

    if (categoria) {
        const cat = categoria.toLowerCase();
        resultado = resultado.filter(r => String(r.categoria).toLowerCase() === cat);
    }

    if ((texto || categoria) && resultado.length === 0) {
        return res.status(404).json({ error: 'Error 404 : Alimento no encontrado' });
    }

    res.status(200).json(resultado);
});

app.get('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const registro = registros.find(r => r.id === id);
    
    if (!registro) {
        return res.status(404).json({ error: 'Error 404 : Registro no encontrado' });
    }
    res.status(200).json(registro);
});

app.post('/api/registros', (req, res) => {
    const { alimento, categoria, cantidad, unidad, fecha_caducidad, conservacion, punto_recogida, email, descripcion } = req.body;
    
    if (!alimento || !categoria || !cantidad) {
        return res.status(400).json({ error: 'Error 400 : Faltan campos obligatorios (alimento, categoría o cantidad)' });
    }

    const nuevoRegistro = {
        id: 0,
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
    
    reindexarRegistros();

    const registroCreado = registros[registros.length - 1];

    res.status(201)
       .header('Location', `/api/registros/${registroCreado.id}`)
       .json(registroCreado);
});

app.put('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const index = registros.findIndex(r => r.id === id);
    
    if (index === -1) {
        return res.status(404).json({ error: 'Error 404 : Registro no encontrado' });
    }

    const { alimento, categoria, cantidad, unidad, fecha_caducidad, conservacion, punto_recogida, email, descripcion } = req.body;

    if (!alimento || !categoria || !cantidad) {
        return res.status(400).json({ error: 'Error 400 : Faltan campos obligatorios' });
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

app.get('/api/solicitudes',(req, res) => {
    res.status(200).json(solicitudes);
});

app.get('/api/solicitudes/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const solicitud = solicitudes.find(s => s.id === id);

    if (!solicitud) {
        return res.status(404).json({ error: 'Error 404 : Solicitud no encontrada' });
    }
    res.status(200).json(solicitud);
});

app.post('/api/solicitudes',(req, res) => {
    const {
        alimento_id,
        cantidad,
        solicitante,
        email,
        importancia,
        observaciones
    } = req.body;

    const alimento = registros.find(r => r.id === Number(alimento_id));

    if (!alimento) {
        return res.status(404).json({
            error: 'Error 404 : El alimento no existe'
        });
    }
    const cantidadSolicitada = Number(cantidad);

    //para comprobar la cantidad que haya
    if(
        !Number.isFinite(cantidadSolicitada) || cantidadSolicitada <=0 || cantidadSolicitada > Number(alimento.cantidad)
    ) {
        return res.status(400).json({
            error: 'Error 400 : La cantidad que has solicitaddo no es valida'
        });
    }

    if (
        !solicitante ||
        !email ||
        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    ) {
        return res.status(400).json({
            error: 'Error 400 : No valido'
        })
    }

    const nuevaSolicitudd = {
        id: nextSolicitudID++,
        alimento_id: alimento_id,
        alimento: alimento.alimento,
        cantidad: cantidadSolicitada,
        unidad: alimento.unidad,
        solicitante,
        email,
        importancia: importancia ? Number(importancia) : 1,
        observaciones: observaciones || '', estado: 'pendiente'
    };
    solicitudes.push(nuevaSolicitudd);

    res.status(201).json(nuevaSolicitudd);
});

app.delete('/api/registros/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const index = registros.findIndex(r => r.id === id);
    
    if (index === -1) {
        return res.status(404).json({ error: 'Error 404 : Registro no encontrado' });
    }

    const eliminado = registros.splice(index, 1);

    reindexarRegistros();

    res.status(200).json(eliminado[0]);
});

app.use((req, res) => {
    res.status(404).json({ error: 'Error 404 : Ruta no encontrada' });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`API corriendo en http://localhost:${PORT}`);
});