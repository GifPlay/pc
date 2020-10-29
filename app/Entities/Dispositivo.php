<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idDispositivo';
    protected $table = 'dispositivos';
    protected $fillable = [
        'nombreDispositivo'
    ];
}
