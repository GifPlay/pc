<?php

namespace App\Http\Controllers;

use App\Entities\ProcedimientoPropietario;
use App\Entities\VistaPropietario;
use App\Propietario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $propietarios = VistaPropietario::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $propietarios = $propietarios->where('nombre','like', '%'.$request->search.'%')
                ->orWhere('telefono','like','%'.$request->search.'%')
                ->orWhere('apellidoPaterno','like','%'.$request->search.'%')
                ->orWhere('apellidoMaterno','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%');

        }

        $propietarios=$propietarios->paginate($limit)->appends($request->all());

        return view("propietarios.index", compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietarios.create');
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
        $resultado = ProcedimientoPropietario::insertPropietario($datos);

        if ($resultado==false) {
            return redirect()->back();
        }
        return redirect()
            ->route('propietarios.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($propietario)
    {
        $propietario = VistaPropietario::where('idPropietario', $propietario)->firstOrFail();
        return view('propietarios.show',compact('propietario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($propietario)
    {

        $propietario = VistaPropietario::where('idPropietario', $propietario)->firstOrFail();
        return view('propietarios.edit',compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $propietario)
    {
        $propietario = VistaPropietario::where('idPropietario', $propietario)->firstOrFail();

        $datos = array_values($request->except(['_method','_token']));

        $resultado = ProcedimientoPropietario::editPropietario($datos);

        if ($resultado==false) {
            return redirect()->back();
        }
        return redirect()
            ->route('propietarios.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($propietario)
    {
        $propietario = Propietario::where('idPropietario', $propietario)->firstOrFail();
        $propietario->delete();
        return redirect()
            ->route('propietarios.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }

    public function exportPDF(){
        $propietarios = VistaPropietario::get();
        $pdf = \PDF::loadView('propietarios.exportPDF', compact('propietarios'));

        //linea para la horientacion
        //$pdf->setPage('letter','landscape');

        //linea para visualizar
        return $pdf->stream();
    }
}
