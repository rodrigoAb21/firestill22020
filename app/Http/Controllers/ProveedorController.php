<?php

namespace App\Http\Controllers;

use App\Modelos\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: ProveedorController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * proveedores.
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
        return view('vistas.proveedores.index',
            [
                'proveedores' => Proveedor::paginate(5),
            ]);
    }



    public function create(){
        return view('vistas.proveedores.create', [
            'monedas' => Proveedor::$MONEDAS,
            'sucursales' => Proveedor::$SUCURSALES,
        ]);
    }


    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        $proveedor->save();

        return redirect('proveedores');
    }

    public function edit($id)
    {
        return view('vistas.proveedores.edit', [
            'monedas' => Proveedor::$MONEDAS,
            'sucursales' => Proveedor::$SUCURSALES,
            'proveedor' => Proveedor::findOrFail($id),
        ]);
    }

    public function show($id)
    {
        return view('vistas.proveedores.show',
            [
                'proveedor' => Proveedor::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request['nombre'];
        $proveedor->nit = $request['nit'];
        $proveedor->email = $request['email'];
        $proveedor->telefono = $request['telefono'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->informacion = $request['informacion'];
        $proveedor->titular = $request['titular'];
        $proveedor->banco = $request['banco'];
        $proveedor->sucursal = $request['sucursal'];
        $proveedor->nro_cuenta = $request['nro_cuenta'];
        $proveedor->moneda = $request['moneda'];
        $proveedor->tipo_identificacion = $request['tipo_identificacion'];
        $proveedor->nro_identificacion = $request['nro_identificacion'];
        $proveedor->update();

        return redirect('proveedores');
    }


    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect('proveedores');
    }
}
