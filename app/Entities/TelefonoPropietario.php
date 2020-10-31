<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TelefonoPropietario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idTelefonoPropietario';
    protected $table = 'telefonos_propietarios';
    protected $fillable = [
        'telefono',
        'tipo'
    ];
}
