<?php

namespace App\Http\Controllers;

use App\Entities\VistaServicio;
use App\Entities\VistaVentas;
use Illuminate\Http\Request;

class VentasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $ventas = VistaVentas::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $ventas = $ventas->where('nombreDispositivo','like', '%'.$request->search.'%')
                ->orWhere('marca','like', '%'.$request->search.'%')
                ->orWhere('modelo','like', '%'.$request->search.'%')
                ->orWhere('fechaRegistro','like', '%'.$request->search.'%')
                ->orWhere('observaciones','like', '%'.$request->search.'%')
                ->orWhere('color','like', '%'.$request->search.'%')
                ->orWhere('accesorio','like', '%'.$request->search.'%')
                ->orWhere('estado','like', '%'.$request->search.'%');
        }

        $ventas=$ventas->paginate($limit)->appends($request->all());

        return view("ventas.index", compact('ventas'));
    }

    public function exportVentas(){
        $ventas = VistaVentas::get('*');

        $pdf = \PDF::loadView('ventas.exportVentas', compact('ventas'));

        //linea para la horientacion
        //$pdf->setPage('letter','landscape');

        //linea para visualizar
        return $pdf->stream();
    }
}
