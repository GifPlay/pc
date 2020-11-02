<?php

namespace App\Http\Controllers;

use App\Entities\Componente;
use App\Entities\Propietario;
use App\Entities\Servicio;
use App\Entities\Tecnico;
use App\Entities\VistaServicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $servicios = $this->contarServicios();
        $propietarios = $this->contarClientes();
        $tecnicos = $this->contarTecnicos();
        $componentes = $this->contarComponentes();
        $ventas = $this->contarVentas();


        return view('home',compact('servicios','propietarios','tecnicos','componentes','ventas'));
    }

    public function contarServicios(){

        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($servicios);
    }

    public function contarClientes(){

        $propietarios = Propietario::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($propietarios);
    }

    public function contarTecnicos(){

        $tecnicos = Tecnico::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($tecnicos);
    }

    public function contarComponentes(){

        $componentes = Componente::select(\DB::raw("COUNT(*) AS 'count'"))
            ->pluck('count');
        return ($componentes);
    }

    public function contarVentas(){

        $ventas = Servicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('idComponente', 'not like', '%' . '1' . '%')
            ->pluck('count');
        return ($ventas);
    }


}
