<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class VistaServicio extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idServicio';
    protected $table = 'editarservicio';
    protected $fillable = [
        'propietario',
        'nombreDispositivo',
        'estado',
        'marca',
        'modelo',
        'fechaRegistro',
        'observaciones',
        'color',
        'accesorios',
        'nombreComponente',
        'nombreServicio',
        'tecnico',
        'folio',
        'formaPago'
    ];
}
