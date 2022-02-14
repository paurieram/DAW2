const express = require('express');
const mongoose = require('mongoose');
const app = express();

const contactos = require('./routes/contactos');
const usuarios = require('./routes/usuarios');

app.set('view engine', 'pug');
app.set('views', './views');

mongoose.connect('mongodb://localhost/agenda', { useNewUrlParser: true, useUnifiedTopology: true });

app.use(express.static('public'));

app.use(express.json());
app.use(express.urlencoded({extended: true}));

app.use('/contactos', contactos);
app.use('/usuarios', usuarios);

app.get('/', (req, res) => {
	res.redirect('/contactos');
});

app.all('*', (req, res) => {
	res.render('error', {texto: "ERROR 404: SITIO NO ENCONTRADO"});
});

app.listen(80);