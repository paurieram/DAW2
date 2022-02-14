const express = require('express');
const router = express.Router();
const Contactos = require('../models/contactos');

router.get('/', (req, res) => {
	Contactos.find((err, docs) => {
		if(!err && docs.length > 0){
			res.render('contactos',{contactos: docs});
		}else{
			res.render('contactos')
		}
	})
	
	
	
});

router.get('/create', (req, res) => {
	let contacto = {name: '',
					mail: '',
					phone: '',
					instagram: ''};

	res.render('form-contactos', { contacto: contacto });
});

router.post('/', (req, res) => {
	res.redirect('/contactos');
});

router.get('/:id/edit', (req, res) => {
	let contacto = {name: 'Ejemplo ejemplo',
					mail: 'ejemplo@ejemplo.com',
					phone: '666666666',
					instagram: '@ejemeplo'};

	res.render('form-contactos', { contacto: contacto });
});

router.post('/update', (req, res) => {
	res.redirect('/contactos');
});

router.get('/:id/delete', (req, res) =>{
   res.redirect('/contactos');
});


module.exports = router;