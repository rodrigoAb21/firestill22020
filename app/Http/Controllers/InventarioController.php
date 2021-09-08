<?php

namespace App\Http\Controllers;

use App\Modelos\Categoria;
use App\Modelos\Contador;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InventarioController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: InventarioController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar
     * los productos.
     * Fecha.........: 03-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de productos
     * Descripcion...: Una lista de productos que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        

        return view('vistas.inventario.index',
            [
                'productos' => Producto::paginate(10),
               
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo producto
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){



        return view('vistas.inventario.create',
            [
                'categorias' => Categoria::all(),
               
            ]);
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'productos'
     * Descripcion...: Crea un nuevo producto con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
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


    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del producto que se quiere editar
     * Salida........: Una vista con el producto que se quiere editar
     * Descripcion...: Obtiene el producto buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {

        return view('vistas.inventario.edit',
            [
                'producto' => Producto::findOrFail($id),
                'categorias' => Categoria::all(),
            
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'productos'
     * Descripcion...: Obtiene el producto a través de su id, y reemplaza
     * todos sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
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

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id del producto
     * Salida........: Ninguna, solo redirecciona a la url 'productos'
     * Descripcion...: Obtiene el producto, lo elimina (softDelete) y
     * redirecciona a la url 'productos'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {

        return view('vistas.inventario.show',
            [
                'producto' => Producto::findOrFail($id),
             
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id del producto
     * Salida........: Ninguna, solo redirecciona a la url 'productos'
     * Descripcion...: Obtiene el producto, lo elimina (softDelete) y
     * redirecciona a la url 'productos'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('inventario');
    }
    
}
