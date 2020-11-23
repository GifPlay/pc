<?php

namespace App\Http\Controllers;

use App\Entities\Componente;
use App\Entities\Dispositivo;
use App\Entities\Propietario;
use App\Entities\Servicio;
use App\Entities\Tecnico;
use App\Entities\TipoServicio;
use App\Entities\VistaPropietario;
use App\Entities\VistaServicio;
use App\Entities\ProcedimientoServicio;


use App\Entities\VistaVentas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;


class ServicioController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $servicios = VistaServicio::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $servicios = $servicios->where('nombreDispositivo','like', '%'.$request->search.'%')
                ->orWhere('marca','like', '%'.$request->search.'%')
                ->orWhere('modelo','like', '%'.$request->search.'%')
                ->orWhere('fechaRegistro','like', '%'.$request->search.'%')
                ->orWhere('observaciones','like', '%'.$request->search.'%')
                ->orWhere('color','like', '%'.$request->search.'%')
                ->orWhere('accesorio','like', '%'.$request->search.'%')
                ->orWhere('estado','like', '%'.$request->search.'%');
        }

        $servicios=$servicios->paginate($limit)->appends($request->all());
        $reparaciones = $this->serviciosReparación();
        $entregas = $this->serviciosEntrega();
        $esperas = $this->serviciosEspera();
        $entregados = $this->serviciosEntregados();


        return view("servicios.index", compact('servicios','reparaciones','entregas','esperas','entregados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $componentes = Componente::select('*')->get();
        $tipoServicios = TipoServicio::select('*')->get();
        $tecnicos = Tecnico::select('*')->get();
        $propietarios = Propietario::all();
        $dispositivos = Dispositivo::select('*')->get();
        $numero = Servicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->whereYear('fechaRegistro', date('Y'))
            ->groupBy(\DB::raw("Month(fechaRegistro)"))->pluck('count');

        return view('servicios.create', compact('componentes','tipoServicios','tecnicos','propietarios','dispositivos','servicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $datos = array_values($request->except(['_method','_token']));
        $resultado = ProcedimientoServicio::insertServicio($datos);

        if($resultado==false) {
            return redirect()->back();
        }


        return redirect()
            ->route('servicio.pdf')
            ->with('message', 'El registro se guardo correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($servicio)
    {
        $servicio = VistaServicio::where('idServicio', $servicio)->firstOrFail();

        return view('servicios.print', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($servicio)
    {
        $componentes = Componente::select('*')->get();
        $tipoServicios = TipoServicio::select('*')->get();
        $tecnicos = Tecnico::select('*')->get();
        $propietarios = Propietario::select('*')->get();
        $dispositivos = Dispositivo::select('*')->get();
        $valores = Servicio::where('idServicio', $servicio)->firstOrFail();
        $servicio = VistaServicio::where('idServicio', $servicio)->firstOrFail();
        return view('servicios.edit', compact('componentes','tipoServicios','tecnicos','servicio','propietarios','dispositivos','valores'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $servicio)
    {
        //$servicio = ProcedimientoServicio::where('idServicio', $servicio)->firstOrFail();

        $datos = array_values($request->except(['_method','_token']));

        $resultado = ProcedimientoServicio::editServicio($datos);

        if($resultado==false) {
            return redirect()->back();
        }

        return redirect()
            ->route('servicios.index')
            ->with('message', 'El registro se guardo correctamente');

        /*

                $vistaServicio = Procedimiento::editVenta($request, $vistaServicio);

                return redirect()
                ->route('vistaServicios.show',$vistaServicio)
                ->with('message', 'El registro se ha actualizado correctamente');
        */

    }


    public function serviciosReparación(){

        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'reparacion' . '%')
            ->pluck('count');
        return ($servicios);
    }
    public function serviciosEntrega(){

        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'entregar' . '%')
            ->pluck('count');
        return ($servicios);
    }
    public function serviciosEspera(){

        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'espera' . '%')
            ->pluck('count');
        return ($servicios);
    }
    public function serviciosEntregados(){

        $servicios = VistaServicio::select(\DB::raw("COUNT(*) AS 'count'"))
            ->where('estado', 'like', '%' . 'entregado' . '%')
            ->pluck('count');
        return ($servicios);
    }

    public function exportServicios(){
        $servicios = VistaServicio::get('*');

        $pdf = \PDF::loadView('Servicios.exportReparacion', compact('servicios'));

        //linea para la horientacion
        //$pdf->setPage('letter','landscape');

        //linea para visualizar
        return $pdf->stream();
    }
}
