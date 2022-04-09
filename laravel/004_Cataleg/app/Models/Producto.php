<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','stock','categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    public function comentarios() {
        return $this->hasMany(Comentario::class, 'producte_id', 'id');
    }
}
