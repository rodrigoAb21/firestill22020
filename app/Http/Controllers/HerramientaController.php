<?php

namespace App\Http\Controllers;

use App\Modelos\BajaHerramienta;
use App\Modelos\DetalleIngresoHerramienta;
use App\Modelos\Empleado;
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
     * Descripción...: Clase que contiene funciones y metodos para gestionar
     * las herramientas.
     * Fecha.........: 15-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    /**
     *************************************************************************
     * Metodo........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista de herramientas
     * Descripcion...: Obtiene una lista de herramientas paginada, y la
     * muestra en una vista.
     * Fecha.........: 15-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index()
    {
        return view('vistas.herramientas.index',
            [
                'herramientas' => Herramienta::paginate(5),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * una nueva herramienta
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create()
    {
        return view('vistas.herramientas.create');
    }

    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'herramientas'
     * Descripcion...: Crea una nueva herramienta con los datos obtenidos de
     * la solicitud HTTP y redirecciona a la url 'herramientas'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $herramienta = new Herramienta();
        $herramienta->nombre = $request['nombre'];
        $herramienta->cantidad_taller = 0;
        $herramienta->cantidad_asignada = 0;
        $herramienta->cantidad_total = 0;
        $herramienta->save();

        return redirect('herramientas');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta que se quiere editar
     * Salida........: Una vista con la herramienta que se quiere editar
     * Descripcion...: Obtiene la herramienta buscandola por su id, y la
     * muestra en un formulario con sus datos para poder ser editada.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.herramientas.edit',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta que se quiere ver
     * Salida........: Una vista con la herramienta.
     * Descripcion...: Obtiene la herramienta y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.herramientas.show',
            [
                'herramienta' => Herramienta::findOrFail($id),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'herramientas'
     * Descripcion...: Obtiene la herramienta a través de su id, y reemplaza
     * todos sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->nombre = $request['nombre'];
        $herramienta->save();
        $herramienta->update();

        return redirect('herramientas');
    }


    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id de la herramienta
     * Salida........: Ninguna, solo redirecciona a la url 'herramientas'
     * Descripcion...: Obtiene la herramienta, la elimina (softDelete) y
     * redirecciona a la url 'herramientas'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->delete();

        return redirect('herramientas');
    }

    // ------------------------------------------------------------------------
    // --------------------------INGRESOS--------------------------------------
    // ------------------------------------------------------------------------

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaIngresos()
    {
        return view('vistas.herramientas.listaIngresos',
            [
                'ingresos' => IngresoHerramienta::
                orderBy('id', 'desc')->paginate(5),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevoIngreso()
    {
        return view('vistas.herramientas.nuevoIngreso', [
            'herramientas' => Herramienta::all(),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function guardarIngreso(Request $request)
    {
        try {
            DB::beginTransaction();
            $ingreso = new IngresoHerramienta();
            $ingreso->fecha = $request['fecha'];
            $ingreso->foto_factura = $request['foto_factura'];
            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/ingresoHerramienta/',
                    $file->getClientOriginalName());
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

                $herramientaAct =
                    Herramienta::findOrfail($detalle->herramienta_id);
                $herramientaAct->cantidad_total =
                    $herramientaAct->cantidad_total + $detalle->cantidad;
                $herramientaAct->cantidad_taller =
                    $herramientaAct->cantidad_taller + $detalle->cantidad;
                $herramientaAct->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }

        return redirect('herramientas/listaIngresos');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function verIngreso($id)
    {
        return view('vistas.herramientas.verIngreso', [
            'ingreso' => IngresoHerramienta::findOrFail($id),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function eliminarIngreso($id)
    {
        $ingreso = IngresoHerramienta::findOrFail($id);
        foreach ($ingreso->detalles as $detalle) {
            $herramienta =
                Herramienta::findOrFail($detalle->herramienta_id);
            $herramienta->cantidad_taller =
                $herramienta->cantidad_taller - $detalle->cantidad;
            $herramienta->cantidad_total =
                $herramienta->cantidad_total - $detalle->cantidad;
            $herramienta->update();
        }
        $ingreso->delete();

        return redirect('herramientas/listaIngresos');
    }

    // ------------------------------------------------------------------------
    // --------------------------BAJAS--------------------------------------
    // ------------------------------------------------------------------------

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaBajas()
    {
        return view('vistas.herramientas.listaBajas',
            ['bajas' => BajaHerramienta::paginate(5)]);
    }
    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevaBaja($id)
    {
        return view('vistas.herramientas.nuevaBaja', [
            'herramienta' => Herramienta::findOrFail($id),
            'empleados' => Empleado::all(),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function darBaja(Request $request)
    {
        $baja  = new BajaHerramienta();
        $baja->fecha = $request->fecha;
        $baja->motivo = $request->motivo;
        $baja->cantidad = $request->cantidad;
        $baja->herramienta_id = $request->herramienta_id;
        $baja->empleado_id = $request->empleado_id;
        $baja->save();

        $herramienta = Herramienta::findOrFail($request->herramienta_id);
        $herramienta->cantidad_taller =
            $herramienta->cantidad_taller - $baja->cantidad;
        $herramienta->cantidad_total =
            $herramienta->cantidad_total - $baja->cantidad;
        $herramienta->update();
        //restar a totaly taller


        return redirect('herramientas/listaBajas');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function anularBaja($id)
    {
        $baja  = BajaHerramienta::findOrFail($id);
            $herramienta = Herramienta::findOrFail($baja->herramienta_id);
            $herramienta->cantidad_taller =
                $herramienta->cantidad_taller + $baja->cantidad;
            $herramienta->cantidad_total =
                $herramienta->cantidad_total + $baja->cantidad;
            $herramienta->update();
        $baja->delete();

        return redirect('herramientas/listaBajas');
    }
    // ------------------------------------------------------------------------
    // --------------------------ASIGNACIONES----------------------------------
    // ------------------------------------------------------------------------

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaAsignaciones()
    {
        return view('vistas.herramientas.listaAsignaciones');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevaAsignacion()
    {
        return view('vistas.herramientas.nuevaAsignacion');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function reingreso()
    {
        return view('vistas.herramientas.reingreso');
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function verAsignacion()
    {
        return view('vistas.herramientas.verAsignacion');
    }


}
