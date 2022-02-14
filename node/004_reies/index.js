const express = require('express');
const mongoose = require('mongoose');
const session = require('express-session');
const app = express();
const juguetes = require('./routes/juguetes');
// const usuarios = require('./routes/usuarios');
app.set('view engine', 'pug');
app.set('views', './views');
mongoose.connect('mongodb://localhost/reis', { useNewUrlParser: true, useUnifiedTopology: true });
app.use(session({
	secret: 'cookie',
	resave: true,
	saveUninitialized: true,
	cookie: {maxAge: 30 * 24 * 60 * 60 * 1000}
}));
app.use(express.static('public'));
//app.use(express.json());
app.use(express.urlencoded({extended: true}));
app.use('/juguetes', juguetes);
// app.use('/usuarios', usuarios);
const Patges = require('./models/patges');

app.get('/', (req, res) => {
	res.render('index', { usuario: req.session.usuarioID });
});

app.post('/login', (req, res) => {
    let filtro = {
        username: req.body.username,
        pass: req.body.pass
    };
    
    Patges.findOne(filtro, (err, doc) => {
        if (doc) {
			req.session.usuarioID = doc._id;
            res.redirect('/juguetes');
        } else {
            res.render('index', {error: 'Datos de acceso incorrectos'});
        }
    });
});

app.get('/logout', (req, res) => {
	req.session.destroy((err) => {
        if (err) {
            console.log('Error al destruir las variables de sesión');
        }
        res.redirect('/');
    })
});

app.get('/cartas', (req, res) => {
    if (!req.session.usuarioID){
        res.render('index', {error: 'Necesitas iniciar sesion para hacer esto'});
    }else{
        res.render('404', {texto: "ERROR 404: SITIO NO ENCONTRADO"});
    }
});



app.all('*', (req, res) => {
	res.render('404', {texto: "ERROR 404: SITIO NO ENCONTRADO"});
});

app.listen(80);