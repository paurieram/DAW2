const mongoose = require('mongoose');

const UsuarioSchema = mongoose.Schema({
    usuario: {
    type: String,
    required: [true, 'El Nombre es Obligatorio'],
    minlength: [3, 'Minimo de 3 caracteres en el usuario']
    },
    pass: {
    type: String,
    required: [true, 'La contraseña es Obligatoria'],
    minlength: [8, 'Minimo de 8 caracteres en la contraseña']
    }
});

const Usuario = mongoose.model('usuarios',UsuarioSchema);
module.exports = Usuario;