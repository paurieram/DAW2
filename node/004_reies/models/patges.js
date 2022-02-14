const mongoose = require('mongoose');

const patgesSchema = mongoose.Schema({
	usuario : {
		type: String,
		required: [true, "El nombre de usuario es obligatorio"]
	},
	password: {
		type: String,
		required: [true, "La contraseña es obligatoria"]
	},
	nombre: {
		type: String,
		required: [true, "El nombre es obligatorio"]
	},
	apellidos: {
		type: String,
		required: [true, "Los apellidos son obligatorios"]
	}
});

const Patges = mongoose.model("pajes", patgesSchema);

module.exports = Patges;