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
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * empleados.
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
        return view('vistas.empleados.create', [
            'tipos' => Empleado::$TIPOS_DE_USUARIO,
        ]);
    }


    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request['nombre'];
        $empleado->apellido = $request['apellido'];
        $empleado->carnet = $request['carnet'];
        $empleado->telefono = $request['telefono'];
        $empleado->direccion = $request['direccion'];
        $empleado->email = $request['email'];
        $empleado->password = bcrypt($request['password']);
        $empleado->tipo = $request['tipo'];
        $empleado->save();

        return redirect('empleados');
    }

    public function edit($id)
    {
        return view('vistas.empleados.edit',
            [
                'empleado' => Empleado::findOrFail($id),
                'tipos' => Empleado::$TIPOS_DE_USUARIO,
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
        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request['nombre'];
        $empleado->apellido = $request['apellido'];
        $empleado->carnet = $request['carnet'];
        $empleado->telefono = $request['telefono'];
        $empleado->direccion = $request['direccion'];
        $empleado->email = $request['email'];
        if (trim($request['password']) != ''){
            $empleado->password = bcrypt($request['password']);
        }
        $empleado->tipo = $request['tipo'];
        $empleado->update();

        return redirect('empleados');
    }


    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect('empleados');
    }
}
