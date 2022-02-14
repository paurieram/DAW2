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
	let datos = {
		usuario: req.body.username,
		pass: req.body.password
	}
	let NuevoUsuario = new Usuario(datos);
	let errores = [];

	// Usuario.find(err, docs) =>{
	// 	let campos = Object.keys(err.errors);

	// 	for(let campo of campos) {
	// 		errores.push(err.errors[campo].message);
	// 	}
	// }

	
	res.render('login');
});

module.exports = router;
