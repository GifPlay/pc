<?php

namespace App\Http\Controllers;

use App\Entities\Componente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade;


class ComponenteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $componentes = Componente::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $componentes = $componentes->where('nombre','like', '%'.$request->search.'%')
                ->orWhere('precio','like', '%'.$request->search.'%')
                ->orWhere('descripcion','like', '%'.$request->search.'%');
        }

        $componentes=$componentes->paginate($limit)->appends($request->all());

        return view("componentes.index", compact('componentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('componentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $componente= new componente();
        $componente = $this->createUpdateComponente($request, $componente);

        return redirect()
            ->route('componentes.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    public function createUpdateComponente(Request $request,$componente){

        $componente->nombre = $request->nombre;
        $componente->precio = $request->precio;
        $componente->descripcion=$request->descripcion;

        $componente->save();
        return $componente;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($componente)
    {
        $componente = Componente::where('idComponente', $componente)->firstOrFail();
        return view('componentes.index', compact('componente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($componente)
    {
        $componente = Componente::where('idComponente', $componente)->firstOrFail();

        return view('componentes.edit', compact('componente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $componente)
    {
        $componente = Componente::where('idComponente', $componente)->firstOrFail();
        $componente = $this->createUpdateComponente($request, $componente);

        return redirect()
            ->route('componentes.index',$componente)
            ->with('message', 'El registro se ha actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($componente)
    {
        $componente = Componente::where('idComponente', $componente)->firstOrFail();
        $componente->delete();
        return redirect()
            ->route('componentes.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }



}
