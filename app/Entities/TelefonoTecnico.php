<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TelefonoTecnico extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idTelefonoTecnico';
    protected $table = 'telefonos_tecnicos';
    protected $fillable = [
        'telefono',
        'tipo'
    ];
}
