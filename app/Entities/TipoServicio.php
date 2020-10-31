<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idTipoServicio';
    protected $table = 'tipos_servicios';
    protected $fillable = [
        'nombre',
        'precio',
        'tiempo'
    ];
}
