<?php

namespace App\Http\Controllers;

use App\Entities\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dispositivos = Dispositivo::select('*');

        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $dispositivos = $dispositivos->where('nombreDispositivo', 'like', '%' . $request->search . '%');
        }

        $dispositivos=$dispositivos->paginate($limit)->appends($request->all());

        return view("dispositivos.index", compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispositivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dispositivo = new dispositivo();
        $dispositivo = $this->createUpdateDispositivo($request, $dispositivo);

        return redirect()
            ->route('dispositivos.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    public function createUpdateDispositivo(Request $request, $dispositivo)
    {
        $dispositivo->idDispositivo = $request->idDispositivo;
        $dispositivo->nombreDispositivo = $request->nombreDispositivo;

        $dispositivo->save();
        return $dispositivo;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($dispositivo)
    {
        $dispositivo = Dispositivo::where('idDispositivo', $dispositivo)->firstOrFail();
        return view('dispositivos.show', compact('dispositivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dispositivo)
    {
        $dispositivo = Dispositivo::where('idDispositivo', $dispositivo)->firstOrFail();
        return view('dispositivos.edit', compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dispositivo)
    {

        $dispositivo = Dispositivo::where('idDispositivo', $dispositivo)->firstOrFail();
        $dispositivo = $this->createUpdateDispositivo($request, $dispositivo);

        return redirect()
            ->route('dispositivos.index', $dispositivo)
            ->with('message', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dispositivo)
    {
        $dispositivo = Dispositivo::where('idDispositivo', $dispositivo)->firstOrFail();
        $dispositivo->delete();
        return redirect()
            ->route('dispositivos.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }
}
