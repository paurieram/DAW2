<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;
    protected $table = 'personajes';
    protected $fillable = ['nombre','apellidos','profesion'];

    public function pais(){
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }
}
