<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class VistaPropietario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idPropietario';
    protected $table = 'editarpropietario';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'telefono',
        'tipo'
    ];
}
