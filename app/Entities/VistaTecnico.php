<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class VistaTecnico extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idTecnico';
    protected $table = 'visualizartecnico';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'telefono',
        'tipo'
    ];
}
