const express = require('express');
const router = express.Router();

const Contacto = require('../models/contactos');

router.get('/', (req, res) => {
	let filtro = {};

    if (req.session.usuarioID) {
        filtro.user = req.session.usuarioID;
    }

	if (req.query.search) {
		let exp = new RegExp(req.query.search, 'i');
		filtro.name = exp;
	}

	Contacto.find(filtro).populate('user', 'username').exec((err, docs) => {
        if (!err && docs.length > 0) {
            console.log(docs)
            res.render('contactos', { contactos: docs, usuario: req.session.usuarioID });
        } else {
            res.render('contactos', { usuario: req.session.usuarioID });
        }
    });
});

router.get('/create', (req, res) => {
    if (req.session.usuarioID) {
        let contacto = {name: '',
					phone: '',
					mail: '',
					instagram: ''};

	    res.render('form-contactos', { contacto: contacto, action: '/contactos', usuario: req.session.usuarioID });
    } else {
        res.render('login', {error: 'Para crear un contacto debes iniciar sesión'});
    }
});

router.post('/', (req, res) => {
	let datosContacto = {
        name: req.body.name,
		mail: req.body.mail,
		phone: req.body.phone,
		instagram: req.body.instagram,
        user: req.session.usuarioID
    };

    let nuevoContacto = new Contacto(datosContacto);

    nuevoContacto.save((err) => {
        if (!err) {
			res.redirect('/contactos');
        } else {
            let errores = [];
            let campos = Object.keys(err.errors);

            for(let campo of campos) {
                errores.push(err.errors[campo].message);
            }
			
			res.render('form-contactos', { errores: errores, contacto: datosContacto, action: '/contactos', usuario: req.session.usuarioID })
        }
    });
});

router.get('/:id/edit', (req, res) => {
	let id = req.params.id;
	
	Contacto.findById(id, (err, doc) => {
        if (!err) {
			res.render('form-contactos', { contacto: doc, action: '/contactos/' + id, usuario: req.session.usuarioID });
        } else {
            res.redirect('/contactos');
        }
    });
});

router.post('/:id', (req, res) => {
	let id = req.params.id;

	let datosContacto = {
        name: req.body.name,
		mail: req.body.mail,
		phone: req.body.phone,
		instagram: req.body.instagram
    };

	Contacto.findByIdAndUpdate(id, datosContacto, { runValidators: true }, (err) => {
		if (!err) {
			res.redirect('/contactos');
        } else {
            let errores = [];
            let campos = Object.keys(err.errors);

            for(let campo of campos) {
                errores.push(err.errors[campo].message);
            }
			
			res.render('form-contactos', { errores: errores, contacto: datosContacto, action: '/contactos/' + id })
        }
	});
});

router.get('/:id/delete', (req, res) =>{
	let id = req.params.id;

    Contacto.findByIdAndRemove(id, (err) => {
        if (!err) {
            res.redirect('/contactos');
        } else {
            console.log('Error al eliminar el contacto');
        }
    });
});


module.exports = router;