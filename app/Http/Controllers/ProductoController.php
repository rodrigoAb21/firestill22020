<?php

namespace App\Http\Controllers;

use App\Modelos\Categoria;
use App\Modelos\Contador;
use App\Modelos\Producto;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    public function index(){
        


        return view('vistas.inventario.index',
            [
                'productos' => Producto::paginate(10),
            ]);
    }

    public function create(){
        


        return view('vistas.inventario.create',
            [
                'categorias' => Categoria::all(),
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|numeric|min:1',
        ]);

        $producto = new Producto();
        $producto->nombre = $request['nombre'];
        $producto->foto = $request['foto'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/img/productos/',
                $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }else{
            $producto->foto = 'default.png';
        }
        $producto->descripcion = $request['descripcion'];
        $producto->cantidad = 0;
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        $producto->save();

        return redirect('inventario');
    }

    public function edit($id)
    {

        return view('vistas.inventario.edit',
            [
                'producto' => Producto::findOrFail($id),
                'categorias' => Categoria::all(),
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|numeric|min:1',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request['nombre'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/img/productos/',
                $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }
        $producto->descripcion = $request['descripcion'];
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        $producto->update();

        return redirect('inventario');
    }

    public function show($id)
    {

        return view('vistas.inventario.show',
            [
                'producto' => Producto::findOrFail($id),
            ]);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('inventario');
    }

    public function reporte(){
        $pdf = PDF::loadView('vistas.inventario.reporte',[ 'productos' => Producto::all()->sortBy('categoria_id')])->setPaper('letter', 'portrait');
        return $pdf->download('inventario_'.date('d-m-Y_H_i_s').'.pdf');
    }
}
