<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idVenta';
    protected $foreingKey = 'idServicio';
    protected $table = 'ventas';
    protected $fillable = [
        'folio',
        'formaPago'
    ];
}
