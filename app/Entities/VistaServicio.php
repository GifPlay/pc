<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class VistaServicio extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idServicio';
    protected $foreingKey = 'idComponente';
    protected $foreingKey1 = 'idTipoServicio';
    protected $foreingKey2 = 'idTecnico';
    protected $table = 'editarservicio';
    protected $fillable = [
        'nombreDispositivo',
        'marca',
        'modelo',
        'fechaRegistro',
        'observaciones',
        'color',
        'accesorios',
        'folio',
        'formaPago'
    ];
}
