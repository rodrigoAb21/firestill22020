<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\Contrato;
use App\Modelos\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MonitoreoController extends Controller
{
    public function listaContratos(){
        return view('vistas.imonitoreo.listaContratos', [
            'contratos' => Contrato::paginate(5),
        ]);
    }

    public function nuevoContrato(){
        return view('vistas.imonitoreo.nuevoContrato',[
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }

    public function guardarContrato(Request $request){
        $contrato = new Contrato();
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->periodo = $request['periodo'];
        if (Input::hasFile('documento')) {
            $file = Input::file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->empleado_id = $request['empleado_id'];
        $contrato->save();

        return redirect('imonitoreo/listaContratos');
    }

    public function verContrato($id){
        return view('vistas.imonitoreo.verContrato',[
            'contrato' => Contrato::findOrFail($id),
        ]);
    }

    public function editarContrato($id){
        return view('vistas.imonitoreo.editarContrato',[
            'contrato' => Contrato::findOrFail($id),
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }

    public function actualizarContrato(Request $request, $id){
        $contrato = Contrato::findOrFail($id);
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->periodo = $request['periodo'];
        if (Input::hasFile('documento')) {
            $file = Input::file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->empleado_id = $request['empleado_id'];
        $contrato->update();

        return redirect('imonitoreo/verContrato/'.$id);
    }







    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------

    public function agenda(){
        return view('vistas.imonitoreo.agenda');
    }
}
