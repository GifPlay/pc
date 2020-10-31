<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idPropietario';
    protected $foreingKey = 'idTelefonoPropietario';
    protected $table = 'propietarios';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email'
    ];
}
