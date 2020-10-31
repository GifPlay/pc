<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idServicio';
    protected $foreingKey = 'idComponente';
    protected $foreingKey1 = 'idTipoServicio';
    protected $foreingKey2 = 'idTecnico';
    protected $foreingKey3 = 'idPropietario';
    protected $foreingKey4 = 'idDispositivo';
    protected $table = 'servicios';
    protected $fillable = [
        'nombre',
        'modelo',
        'fechaRegistro',
        'observaciones',
        'color',
        'accesorios'
    ];
}
