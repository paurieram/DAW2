const express = require('express');
const router = express.Router();

const Usuario = require('../models/usuarios');

router.get('/login', (req, res) => {
	res.render('login');
});

router.post('/login', (req, res) => {
    let filtro = {
        username: req.body.username,
        pass: req.body.pass
    };
    
    Usuario.findOne(filtro, (err, doc) => {
        if (doc) {
			req.session.usuarioID = doc._id;
            res.redirect('/contactos');
        } else {
            res.render('login', {error: 'Datos de acceso incorrectos'});
        }
    });
});

router.get('/logout', (req, res) => {
	req.session.destroy((err) => {
        if (err) {
            console.log('Error al destruir las variables de sesión');
        }
        res.redirect('/contactos');
    })
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