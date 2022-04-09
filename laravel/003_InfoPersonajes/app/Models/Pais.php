<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'paises';
    protected $fillable = ['nombre','capital','superficie','poblacion'];

    public function personajes(){
        return $this->hasMany(Personaje::class, 'pais_id', 'id');
    }
}
