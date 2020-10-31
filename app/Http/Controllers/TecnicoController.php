<?php

namespace App\Http\Controllers;

use App\Entities\ProcedimientoTecnico;
use App\Entities\Tecnico;
use App\Entities\vistaTecnico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tecnicos = vistaTecnico::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $tecnicos = $tecnicos->where('nombre','like', '%'.$request->search.'%')
                ->orWhere('telefono','like','%'.$request->search.'%')
                ->orWhere('apellidoPaterno','like','%'.$request->search.'%')
                ->orWhere('apellidoMaterno','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%');

        }

        $tecnicos=$tecnicos->paginate($limit)->appends($request->all());

        return view("tecnicos.index", compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tecnicos.create');
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
        $resultado = ProcedimientoTecnico::insertTecnico($datos);

        if ($resultado==false) {
            return redirect()->back();
        }
        return redirect()
            ->route('tecnicos.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tecnico)
    {
        $tecnico = VistaTecnico::where('idTecnico', $tecnico)->firstOrFail();
        return view('tecnicos.show',compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tecnico)
    {

        $tecnico = VistaTecnico::where('idTecnico', $tecnico)->firstOrFail();
        return view('tecnicos.edit',compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tecnico)
    {
        $tecnico = Tecnico::where('idTecnico', $tecnico)->firstOrFail();

        $datos = array_values($request->except(['_method','_token']));

        $resultado = ProcedimientoTecnico::editTecnico($datos);

        if ($resultado==false) {
            return redirect()->back();
        }
        return redirect()
            ->route('tecnicos.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tecnico)
    {
        $tecnico = Tecnico::where('id_mecanico', $tecnico)->firstOrFail();
        $tecnico->delete();
        return redirect()
            ->route('tecnicos.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }

    public function exportPDF(){
        $tecnicos = VistaTecnico::get();
        $pdf = \PDF::loadView('tecnicos.exportPDF', compact('tecnicos'));

        //linea para la horientacion
        //$pdf->setPage('letter','landscape');

        //linea para visualizar
        return $pdf->stream();
    }
}
