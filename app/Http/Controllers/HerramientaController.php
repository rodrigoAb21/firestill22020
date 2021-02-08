<?php

namespace App\Http\Controllers;

use App\Modelos\Herramienta;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: HerramientaController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar las
     * herramientas.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Metodo........: index
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.herramientas.index',
            [
                'herramientas' => Herramienta::paginate(5),
            ]);
    }



    public function create(){
        return view('vistas.herramientas.create');
    }


    public function store(Request $request)
    {
        $herramienta = new Herramienta();
        $herramienta->nombre = $request['nombre'];
        $herramienta->cantidad_taller = 0;
        $herramienta->cantidad_asignada = 0;
        $herramienta->cantidad_total =0 ;
        $herramienta->save();

        return redirect('herramientas');
    }

    public function edit($id)
    {
        return view('vistas.herramientas.edit',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }

    public function show($id)
    {
        return view('vistas.herramientas.show',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->nombre = $request['nombre'];
        $herramienta->save();
        $herramienta->update();

        return redirect('herramientas');
    }


    public function destroy($id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->delete();

        return redirect('herramientas');
    }
}
