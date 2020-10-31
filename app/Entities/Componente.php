<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idComponente';
    protected $table = 'componentes';
    protected $fillable = [
        'nombre',
        'precio',
        'descripción'
    ];
}
