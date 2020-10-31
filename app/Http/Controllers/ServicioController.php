<?php

namespace App\Http\Controllers;

use App\Entities\Componente;
use App\Entities\Tecnico;
use App\Entities\TipoServicio;
use App\Entities\VistaServicio;
use App\Entities\ProcedimientoServicio;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade;


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
                ->orWhere('accesorio','like', '%'.$request->search.'%');
        }

        $servicios=$servicios->paginate($limit)->appends($request->all());

        return view("servicios.index", compact('servicios'));
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

        return view('vistaServicios.create', compact('componentes','tipoServicios','tecnicos'));
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
            ->route('servicios.index')
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
        return view('servicios.show', compact('servicio'));
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
        $servicio = ProcedimientoServicio::where('idServicio', $servicio)->firstOrFail();
        return view('servicios.edit', compact('componentes','tipoServicios','tecnicos','servicio'));

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
        $servicio = ProcedimientoServicio::where('idServicio', $servicio)->firstOrFail();

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


    public function exportPDF(){
        $servicios = VistaServicio::get();
        $pdf = \PDF::loadView('servicios.exportPDF2', compact('servicios'));

        //linea para la horientacion
        //$pdf->setPage('letter','landscape');

        //linea para visualizar
        return $pdf->stream();
    }


}
