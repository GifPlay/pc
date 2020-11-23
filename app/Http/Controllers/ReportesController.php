<?php

namespace App\Http\Controllers;

use App\Entities\Propietario;
use App\Entities\Servicio;
use App\Entities\Venta;
use App\Entities\VistaVentas;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $propietarios = $this->Propietarios();
        $servicios = $this->Servicios();
        $ventas = $this->Ventas();
        return view("reportes",compact('propietarios','servicios','ventas'));
    }

    public function Propietarios(){
        $propietarios = Propietario::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($propietarios);
    }
    public function Servicios(){
        $servicios = Servicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($servicios);
    }
    public function Ventas(){
        $ventas = VistaVentas::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($ventas);
    }
}
