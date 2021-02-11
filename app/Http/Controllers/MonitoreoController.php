<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\Empleado;
use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    public function listaContratos(){
        return view('vistas.imonitoreo.listaContratos');
    }

    public function nuevoContrato(){
        return view('vistas.imonitoreo.nuevoContrato',[
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }
}
