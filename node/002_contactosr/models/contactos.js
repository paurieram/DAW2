const mongoose = require('mongoose');

const contactoSchema = mongoose.Schema({
	name : {
		type: String,
		required: [true, "El nombre es obligatorio"]
	},
	phone: {
		type: String,
		required: [true, "El teléfono es obligatorio"],
		match: [/[0-9]{9}/, 'El número de teléfono introducido no es válido']
	},
	mail: {
		type: String,
		required: [true, "El email es obligatorio"],
		match: [/[a-zA-Z0-9_.]{1,}@[a-zA-Z0-9_.]{1,}[.][a-zA-Z]{2,}/, 'El email introducido no es válido']
	},
	instagram: {
		type: String
	},
	user: {
		type: mongoose.ObjectId,
		require: true,
		ref: 'usuarios'
	}
});

const Contacto = mongoose.model("contactos", contactoSchema);

module.exports = Contacto;