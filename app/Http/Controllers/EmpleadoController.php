<?php

namespace App\Http\Controllers;

use App\Modelos\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: EmpleadoController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar las
     * categorías.
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
        return view('vistas.empleados.index',
            [
                'empleados' => Empleado::paginate(5),
            ]);
    }



    public function create(){
        return view('vistas.empleados.create');
    }


    public function store(Request $request)
    {
        $categoria = new Empleado();
        $categoria->nombre = $request['nombre'];
        $categoria->apellido = $request['apellido'];
        $categoria->carnet = $request['carnet'];
        $categoria->telefono = $request['telefono'];
        $categoria->direccion = $request['direccion'];
        $categoria->email = $request['email'];
        $categoria->save();

        return redirect('empleados');
    }

    public function edit($id)
    {
        return view('vistas.empleados.edit',
            [
                'empleado' => Empleado::findOrFail($id),
            ]);
    }

    public function show($id)
    {
        return view('vistas.empleados.show',
            [
                'empleado' => Empleado::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $categoria = Empleado::findOrFail($id);
        $categoria->nombre = $request['nombre'];
        $categoria->apellido = $request['apellido'];
        $categoria->carnet = $request['carnet'];
        $categoria->telefono = $request['telefono'];
        $categoria->direccion = $request['direccion'];
        $categoria->email = $request['email'];
        $categoria->update();

        return redirect('empleados');
    }


    public function destroy($id)
    {
        $categoria = Empleado::findOrFail($id);
        $categoria->delete();

        return redirect('empleados');
    }
}
