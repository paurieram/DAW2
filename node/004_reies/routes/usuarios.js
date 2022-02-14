const express = require('express');
const router = express.Router();

const Usuario = require('../models/usuarios');

router.get('/login', (req, res) => {
	res.render('login');
});

router.post('/login', (req, res) => {
	res.redirect('/contactos');
});

router.get('/signup', (req, res) => {
	res.render('form-signup');
});

router.post('/signup', (req, res) => {
    let datosUsuario = {
        username: req.body.username,
        pass: req.body.pass
    };
    let nuevoUsuario = new Usuario(datosUsuario);
    nuevoUsuario.save((err) => {
        if (!err) {
			res.redirect('/usuarios/login');
        } else {
            let errores = [];
            let campos = Object.keys(err.errors);
            for(let campo of campos) {
                errores.push(err.errors[campo].message);
            }
			res.render('form-signup', { errores: errores })
        }
    });
});

module.exports = router;