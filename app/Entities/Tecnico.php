<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idTecnico';
    protected $foreingKey = 'idTelefonoTecnico';
    protected $table = 'tecnicos';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email'
    ];
}
