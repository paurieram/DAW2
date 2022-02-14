const mongoose = require('mongoose');

const contactoSchema = mongoose.Schema({
    nombre: {
    type: String,
    required: [true, 'El Nombre es Obligatorio'],
    minlength: [3, 'Minimo de 3 caracteres']
},
phone: {
    type: String,
    required: [true, 'El telefono es Obligatorio'],
    match: []
},
mail: {
    type: String,
    
},
instagram: {
    type: String
},


});

const Contacto = mongoose.model('contactos',contactoSchema)
module.exports = Contacto;