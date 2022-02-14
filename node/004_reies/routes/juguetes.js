const express = require('express');
const router = express.Router();

const Juguetes = require('../models/juguetes');


router.get('/', (req, res) => {
	if (!req.session.usuarioID){
		res.render('index', {error: 'Necesitas iniciar sesion para hacer esto'});
	}else{
		Juguetes.find((err, docs) => {
			if (!err && docs.length > 0) {
				res.render('juguetes', { juguetes: docs, usuario: req.session.usuarioID });
			} else {
				res.render('juguetes');
			};
		});
	}
});

router.get('/create', (req, res) => {
	let juguete = {name: '',
					mail: '',
					phone: '',
					instagram: '',
					action: '/juguetes'};
	res.render('form-juguetes', { juguetes: juguete, usuario: req.session.usuarioID });
});

router.post('/', (req, res) => {
	let juguete = {
		nombre: req.body.nombre,
		precio: req.body.precio,
		peso: req.body.peso,
		stock: req.body.stock
	};
	let nuevoJuguetes = new Juguetes(juguete);
	nuevoJuguetes.save((err) => {
		if (!err) {
			res.redirect('/juguetes');
		} else {
			let errores = [];
			let campos = Object.keys(err.errors);
			for(let campo of campos) {
				errores.push(err.errors[campo].message);
			}
			juguete.action="/juguetes";
			res.render('form-juguetes', { errores: errores, juguetes: juguete, usuario: req.session.usuarioID })
		}
	});
});

router.get('/:id/edit', (req, res) => {
	Juguetes.findById(req.params.id,(err, docs) => {
		if (!err){
			docs.action="/juguetes/"+req.params.id;
			res.render('form-juguetes', { juguetes: docs, usuario: req.session.usuarioID });
		}
	});
});

router.post('/:id', (req, res) => {
	let juguete = {
		nombre: req.body.nombre,
		precio: req.body.precio,
		peso: req.body.peso,
		stock: req.body.stock
	};

	Juguetes.findByIdAndUpdate(req.params.id, juguete, { runValidators: true }, (err, docs) => {
		if (!err){
			res.redirect('/juguetes');
		} else {
            let errores = [];
            let campos = Object.keys(err.errors);
            for(let campo of campos) {
                errores.push(err.errors[campo].message);
            }
			juguete.action="/juguetes";
			res.render('form-juguetes', { errores: errores, juguetes: juguete, usuario: req.session.usuarioID })
        }
	});
});

router.get('/:id/delete', (req, res) =>{
	let id = req.params.id;
	Juguetes.findByIdAndRemove(id, (err) =>{
		if(!err){
			res.redirect('/juguetes');
		}else{
			let errores = [];
            let campos = Object.keys(err.errors);
            for(let campo of campos) {
                errores.push(err.errors[campo].message);
            }
			console.log(errores)
		}
	})
});

module.exports = router;