<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\DetalleNotaVenta;
use App\Modelos\Empleado;
use App\Modelos\NotaVenta;
use App\Modelos\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function ventas()
    {
        return view('vistas.ventas.ventas', [
            'ventas' => NotaVenta::where('tipo', '=', true)->paginate(5)
        ]);
    }
    public function nuevaVenta()
    {
        return view('vistas.ventas.nuevaVenta',[
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
            'productos' => Producto::all(),
        ]);
    }
    public function guardarVenta(Request $request)
    {
        try {
            DB::beginTransaction();
            $venta = new NotaVenta();
            $venta->fecha = $request['fecha'];
            $venta->total = $request['total'];
            $venta->empleado_id = $request['empleado_id'];
            $venta->cliente_id = $request['cliente_id'];
            $venta->save();

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $precios = $request->get('precioT');
            $cont = 0;


            while ($cont < count($idProductos)) {
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

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('inventario/listaIngresos');

    }
    public function verVenta($id)
    {
        return view('vistas.ventas.verVenta', [
            'venta' => NotaVenta::findOrFail($id),
        ]);
    }
    public function eliminarVenta($id)
    {
        $venta = NotaVenta::findOrFail($id);
        foreach ($venta->detalles as $detalle){
            $producto = Producto::withTrashed()->findOrFail($detalle->producto_id);
            $producto->cantidad = $producto->cantidad + $detalle->cantidad;
            $producto->update();
        }
        $venta->delete();

        return redirect('ventas/ventas');
    }
}
