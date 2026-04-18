<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombre',
        'email',
        'id_carrera',
        'semestre'
    ];

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
