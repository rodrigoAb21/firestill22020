<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\DetalleNotaVenta;
use App\Modelos\Empleado;
use App\Modelos\NotaVenta;
use App\Modelos\Producto;
use App\Modelos\Servicio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function servicios()
    {
        return view('vistas.servicios.servicios', [
            'ventas' => NotaVenta::where('tipo', '=', false)->paginate(5)
        ]);
    }
    public function nuevoServicio()
    {
        return view('vistas.servicios.nuevoServicio',[
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
            'productos' => Producto::all(),
        ]);
    }
    public function guardarServicio(Request $request)
    {
        try {
            DB::beginTransaction();
            $venta = new NotaVenta();
            $venta->fecha = $request['fecha'];
            $venta->total = $request['total'];
            $venta->tipo = false;
            $venta->empleado_id = $request['empleado_id'];
            $venta->cliente_id = $request['cliente_id'];
            $venta->save();

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $precios = $request->get('precioT');
            $cont = 0;

            $nombres = $request->get('nombresT');
            $preciosS = $request->get('preciosST');


            while ($cont < count($idProductos)) {
                // --------- DETALLE----------
                $detalle = new DetalleNotaVenta();
                $detalle->cantidad = $cant[$cont];
                $detalle->precio = $precios[$cont];
                $detalle->producto_id = $idProductos[$cont];
                $detalle->nota_venta_id = $venta->id;
                $detalle->save();

                $producto =
                    Producto::findOrfail($detalle->producto_id);
                $producto->cantidad =
                    $producto->cantidad - $detalle->cantidad;
                $producto->update();

                // --------- SERVICIOS ----------
                $servicio = new Servicio();
                $servicio->nombre = $nombres[$cont];
                $servicio->precio = $preciosS[$cont];
                $servicio->nota_venta_id = $venta->id;
                $servicio->save();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('ventas/servicios');

    }
    public function verServicio($id)
    {
        return view('vistas.servicios.verServicio', [
            'venta' => NotaVenta::findOrFail($id),
        ]);
    }
    public function eliminarServicio($id)
    {
        $venta = NotaVenta::findOrFail($id);
        foreach ($venta->detalles as $detalle){
            $producto = Producto::withTrashed()->findOrFail($detalle->producto_id);
            $producto->cantidad = $producto->cantidad + $detalle->cantidad;
            $producto->update();
        }
        $venta->delete();

        return redirect('ventas/servicios');
    }
}
