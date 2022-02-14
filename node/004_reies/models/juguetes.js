const mongoose = require('mongoose');

const juguetesSchema = mongoose.Schema({
	nombre : {
		type: String,
		required: [true, "El nombre es obligatorio"],
		maxLength: [80,"El nombre es demasiado largo"],
		match: [/[0-9A-Z -]{1,80}/,"El nombre no es válido"]
	},
	precio: {
		type: Number,	
		required: [true, "El precio es obligatorio"],
		min: [0, "El precio no puede ser menos de 0"]
	},
	peso: {
		type: Number,
		required: [true, "El peso es obligatorio"],
		min: [0, "El peso no puede ser menos de 0"],
		max: [20, "El peso no puede ser mas de 20"]
	},
	stock: {
		type: Number,
		required: [true, "El stock es obligatorio"],
		min: [0, "El stock no puede ser menos de 0"],
		default: 0
	}
});

const Juguetes = mongoose.model("juguetes", juguetesSchema);

module.exports = Juguetes;