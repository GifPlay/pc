<?php

namespace App\Http\Controllers;

use App\Entities\Servicio;
use Illuminate\Http\Request;
use App\Entities\VistaServicio;

class GraficaController extends Controller
{

    public function graficarServicios(){


        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');

        $reparacion = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'reparación' . '%')
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');

        $espera = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'espera' . '%')
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');

        $terminado = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'entrega' . '%')
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');

        $entregado = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'entregado' . '%')
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');


        return view('graficas.graficarServicios', compact('servicios','reparacion','espera','terminado','entregado'));
    }

    public function graficarTecnicos(){

        $tecnicos = Servicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->groupBy(\DB::raw("idTecnico"))->pluck('count');

        $nombres = VistaServicio::select('tecnico')->distinct()->get();

        $entregados = Servicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'entregado' . '%')
            ->groupBy(\DB::raw("idTecnico"))->pluck('count');

        //$nombres = vistaServicio::select(\DB::distinct("tecnico"));

        return view('graficas.graficarTecnicos', compact('tecnicos','nombres','entregados'));
    }
}
