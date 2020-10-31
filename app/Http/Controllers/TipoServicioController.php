<?php

namespace App\Http\Controllers;

use App\Entities\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipoServicios = TipoServicio::select('*');

        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $tipoServicios = $tipoServicios->where('nombre', 'like', '%' . $request->search . '%')
            ->orWhere('precio', 'like', '%' . $request->search . '%')
                ->orWhere('tiempo', 'like', '%' . $request->search . '%');
        }

        $tipoServicios=$tipoServicios->paginate($limit)->appends($request->all());

        return view("tiposServicios.index", compact('tipoServicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposServicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoServicios = new tipoServicio();
        $tipoServicios = $this->createUpdateTipoServicio($request, $tipoServicios);

        return redirect()
            ->route('tiposServicios.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    public function createUpdateTipoServicio(Request $request, $tipoServicio)
    {
        $tipoServicio->idTipoServicio = $request->idTipoServicio;
        $tipoServicio->nombre = $request->nombre;
        $tipoServicio->precio = $request->precio;
        $tipoServicio->tiempo = $request->tiempo;

        $tipoServicio->save();
        return $tipoServicio;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($tipoServicio)
    {
        $tipoServicio = TipoServicio::where('idTipoServicio', $tipoServicio)->firstOrFail();
        return view('tiposServicios.show', compact('tipoServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tipoServicio)
    {
        $tipoServicio = TipoServicio::where('idTipoServicio', $tipoServicio)->firstOrFail();
        return view('tiposServicios.edit', compact('tipoServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipoServicio)
    {

        $tipoServicio = TipoServicio::where('idTipoServicio', $tipoServicio)->firstOrFail();
        $tipoServicio = $this->createUpdateTipoServicio($request, $tipoServicio);

        return redirect()
            ->route('tiposServicios.index', $tipoServicio)
            ->with('message', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoServicios)
    {
        $tipoServicios = TipoServicio::where('idTipoServicio', $tipoServicios)->firstOrFail();
        $tipoServicios->delete();
        return redirect()
            ->route('tiposServicios.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }
}
