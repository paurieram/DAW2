const express = require('express');
const mongoose = require('mongoose');
const session = require('express-session');

const app = express();

const contactos = require('./routes/contactos');
const usuarios = require('./routes/usuarios');

app.set('view engine', 'pug');
app.set('views', './views');

mongoose.connect('mongodb://localhost/agenda', { useNewUrlParser: true, useUnifiedTopology: true });

app.use(session({
	secret: 'Tontaco',
	resave: true,
	saveUninitialized: true,
	cookie: {
		maxAge: 30 * 24 * 60 * 60 * 1000
	}
}));

app.use(express.static('public'));

//app.use(express.json());
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