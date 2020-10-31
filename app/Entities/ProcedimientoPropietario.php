<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProcedimientoPropietario extends Model
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
    public static function insertPropietario($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL insertPropietario(?,?,?,?,?,?)',$datos);
        }
        return $result;
    }

    public static function editPropietario($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL editPropietario(?,?,?,?,?,?,?)',$datos);
        }
        return $result;
    }
}
