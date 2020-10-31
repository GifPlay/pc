<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProcedimientoTecnico extends Model
{
   /* //vista para editar tecnicos
    public $timestamps = false;
    protected $table = 'mecanico_editar';
    protected $filellable = [
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'rfc',
        'calle','numero','municipio','colonia',
        'telefono','tipo',
        'correo'
    ];
*/
    public static function insertTecnico($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL insertTecnico(?,?,?,?,?,?)',$datos);
        }
        return $result;
    }

    public static function editTecnico($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL editTecnico(?,?,?,?,?,?,?)',$datos);
        }
        return $result;
    }
}
