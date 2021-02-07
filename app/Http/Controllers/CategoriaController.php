<?php

namespace App\Http\Controllers;

use App\Modelos\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: CategoriaController
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
        return view('vistas.categorias.index',
            [
                'categorias' => Categoria::paginate(5),
            ]);
    }



    public function create(){
        return view('vistas.categorias.create');
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request['nombre'];
        $categoria->save();

        return redirect('categorias');
    }

    public function edit($id)
    {
        return view('vistas.categorias.edit',
            [
                'categoria' => Categoria::findOrFail($id),
            ]);
    }


    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request['nombre'];
        $categoria->update();

        return redirect('categorias');
    }


    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect('categorias');
    }
}
