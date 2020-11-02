<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProcedimientoServicio extends Model
{

    public static function insertServicio($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL insertServicio(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$datos);
        }
        return $result;
    }

    public static function editServicio($datos=[]){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('CALL editServicio(?,?,?,?,?,?,?,?,?,?,?,?)',$datos);
        }
        return $result;
    }

    public static function reparacion(){
        $result =\DB::table('servicios')->count()->where('reparacion');
        return $result;
    }
}
