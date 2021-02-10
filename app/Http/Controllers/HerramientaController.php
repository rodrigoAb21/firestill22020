<?php

namespace App\Http\Controllers;

use App\Modelos\DetalleIngresoHerramienta;
use App\Modelos\Herramienta;
use App\Modelos\IngresoHerramienta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

    // ------------------------------------------------------------------------
    // --------------------------INGRESOS--------------------------------------
    // ------------------------------------------------------------------------

    public function listaIngresos(){
        return view('vistas.herramientas.listaIngresos',
            [
                'ingresos' => IngresoHerramienta::paginate(5),
            ]);
    }

    public function nuevoIngreso()
    {
        return view('vistas.herramientas.nuevoIngreso', [
            'herramientas' => Herramienta::all(),
        ]);
    }

    public function guardarIngreso(Request $request){
        try {
            DB::beginTransaction();
            $ingreso = new IngresoHerramienta();
            $ingreso->fecha = $request['fecha'];
            $ingreso->foto_factura = $request['foto_factura'];
            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path().'/img/ingresoHerramienta/', $file->getClientOriginalName());
                $ingreso->foto_factura = $file->getClientOriginalName();
            }
            $ingreso->nro_factura = $request['nro_factura'];
            $ingreso->tienda = $request['tienda'];
            $ingreso->save();

            $idHerramientas = $request->get('idHerramientaT');
            $cant = $request->get('cantidadT');
            $cont = 0;

            while ($cont < count($idHerramientas)) {
                $detalle = new DetalleIngresoHerramienta();
                $detalle->cantidad = $cant[$cont];
                $detalle->herramienta_id = $idHerramientas[$cont];
                $detalle->ingreso_herramienta_id = $ingreso->id;
                $detalle->save();

                $herramientaAct = Herramienta::findOrfail($detalle->herramienta_id);
                $herramientaAct->cantidad_total = $herramientaAct->cantidad_total + $detalle->cantidad;
                $herramientaAct->cantidad_taller = $herramientaAct->cantidad_taller + $detalle->cantidad;
                $herramientaAct->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }
        
        return redirect('herramientas/listaIngresos');
    }

    public function verIngreso($id)
    {
        return view('vistas.herramientas.verIngreso', [
            'ingreso' => IngresoHerramienta::findOrFail($id),
        ]);
    }

    public function eliminarIngreso($id)
    {
        $ingreso = IngresoHerramienta::findOrFail($id);
        foreach ($ingreso->detalles as $detalle){
            $herramienta = Herramienta::findOrFail($detalle->herramienta_id);
            $herramienta->cantidad_taller = $herramienta->cantidad_taller - $detalle->cantidad;
            $herramienta->cantidad_total = $herramienta->cantidad_total - $detalle->cantidad;
            $herramienta->update();
        }
        $ingreso->delete();

        return redirect('herramientas/listaIngresos');
    }

    // ------------------------------------------------------------------------
    // --------------------------BAJAS--------------------------------------
    // ------------------------------------------------------------------------
    public function listaBajas()
    {
        return view('vistas.herramientas.listaBajas');
    }
    public function anularBaja()
    {
        return view('vistas.herramientas.listaBajas');
    }
    // ------------------------------------------------------------------------
    // --------------------------ASIGNACIONES----------------------------------
    // ------------------------------------------------------------------------
    public function listaAsignaciones()
    {
        return view('vistas.herramientas.listaAsignaciones');
    }

    public function nuevaAsignacion()
    {
        return view('vistas.herramientas.nuevaAsignacion');
    }

    public function reingreso()
    {
        return view('vistas.herramientas.reingreso');
    }

    public function verAsignacion()
    {
        return view('vistas.herramientas.verAsignacion');
    }



}
