<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: ClienteController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * clientes.
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
        return view('vistas.clientes.index',
            [
                'clientes' => Cliente::paginate(5),
            ]);
    }



    public function create(){
        return view('vistas.clientes.create');
    }


    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre_empresa = $request['nombre_empresa'];
        $cliente->nit = $request['nit'];
        $cliente->email = $request['email'];
        $cliente->telefono_empresa = $request['telefono_empresa'];
        $cliente->direccion = $request['direccion'];
        $cliente->nombre_encargado = $request['nombre_encargado'];
        $cliente->cargo_encargado = $request['cargo_encargado'];
        $cliente->telefono_encargado = $request['telefono_encargado'];
        $cliente->save();

        return redirect('clientes');
    }

    public function edit($id)
    {
        return view('vistas.clientes.edit', [
            'cliente' => Cliente::findOrFail($id),
        ]);
    }

    public function show($id)
    {
        return view('vistas.clientes.show',
            [
                'cliente' => Cliente::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre_empresa = $request['nombre_empresa'];
        $cliente->nit = $request['nit'];
        $cliente->email = $request['email'];
        $cliente->telefono_empresa = $request['telefono_empresa'];
        $cliente->direccion = $request['direccion'];
        $cliente->nombre_encargado = $request['nombre_encargado'];
        $cliente->cargo_encargado = $request['cargo_encargado'];
        $cliente->telefono_encargado = $request['telefono_encargado'];
        $cliente->update();

        return redirect('clientes');
    }


    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect('clientes');
    }
}
