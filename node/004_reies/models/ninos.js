const mongoose = require('mongoose');

const ninosSchema = mongoose.Schema({
	nombre : {
		type: String,
		required: [true, "El nombre es obligatorio"],
	},
	apellidos : {
		type: String,
		required: [true, "Los apellidos son obligatorio"],
	},
    fechaNacimiento : {
		type: Date,
		required: [true, "La fechaNacimiento es obligatoria"],
	},
    comportamiento : {
		type: String,
		required: [true, "El comportamiento es obligatorio"],
	},
    poblacion : {
		type: String,
		required: [true, "El poblacion es obligatoria"],
	},
    pais : {
		type: String,
		required: [true, "El pais es obligatorio"],
	}
    .virtual("nombreCompleto").get(function() {
        return this.nombre + ' ' + this.apellidos;
    })
    .virtual("edad").get(function() {
        let hoy = new Date();
        let fechaNacimiento = new Date(this.fechaNacimiento);
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
	        edad--;
        }
        return edad;
    })
});

const Ninos = mongoose.model("ninos", ninosSchema);

module.exports = Ninos;