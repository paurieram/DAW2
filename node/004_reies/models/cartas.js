const mongoose = require('mongoose');

const cartasSchema = mongoose.Schema({
	nino : {
		type: mongoose.ObjectID,
		required: [true, "El nino es obligatorio"],
        ref: "ninos"
	},
	paje: {
		type: mongoose.ObjectID,	
		required: [true, "El paje es obligatorio"],
        ref: "pajes"
	},
	peticiones: {
		type: [mongoose.ObjectID],
		required: [true, "Las peticiones son obligatorias"],
        ref: "juguetes"
	},
	aceptada: {
		type: Boolean,
		required: [true, "El stock es obligatorio"]
	}
});

const Cartas = mongoose.model("cartas", cartasSchema);

module.exports = Cartas;