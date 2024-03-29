<?php

namespace App\Http\Controllers;

use App\Modelos\Categoria;
use App\Modelos\Contador;
use App\Modelos\Producto;

use App\Utils\Utils;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    public function index(){
        


        return view('vistas.inventario.index',
            [
                'productos' => Producto::all()
            ]);
    }

    public function create(){

        return view('vistas.inventario.create',
            [
                'categorias' => Categoria::all(),
                'paises' => Utils::$PAISES,
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'origen' => 'required|string',
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
        $producto->origen=$request['origen'];
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
                'paises' => Utils::$PAISES,
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'origen' => 'required|string',
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
        $producto->origen=$request['origen'];
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
        $pdf = PDF::loadView('vistas.inventario.reporte',[ 'productos' => Producto::all()->sortBy('categoria_id')])->setPaper('letter', 'landscape');
        //portrait-landscape
        return $pdf->download('inventario_'.date('d-m-Y_H_i_s').'.pdf');
    }

    public function  algo(){
        
    }
}
