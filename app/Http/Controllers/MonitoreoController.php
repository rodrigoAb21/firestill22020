<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\Contrato;
use App\Modelos\Empleado;
use App\Modelos\Equipo;
use App\Modelos\MarcaClasificacion;
use App\Modelos\Sucursal;
use App\Modelos\TipoClasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MonitoreoController extends Controller
{
    //-----------------------------------------------------------------------
    //-----------------------------CONTRATOS---------------------------------
    //-----------------------------------------------------------------------

    public function listaContratos(){
        $this->actualizarEstados();
        return view('vistas.imonitoreo.listaContratos', [
            'contratos' => Contrato::paginate(5),
        ]);
    }

    public function actualizarEstados(){
        $hoy = date('Y-m-d');
        $contratos = Contrato::
            where('estado','=', 'Vigente')
            ->where('fecha_fin', '<', $hoy)
            ->get();
        foreach ($contratos as $contrato){
            $contrato->estado = 'Finalizado';
            $contrato->update();
        }
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
        $contrato->estado = "Vigente";
        $contrato->edicion = true;
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
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
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

        return redirect('imonitoreo/editarContrato/'.$id);
    }

    public function eliminarContrato($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();

        return redirect('imonitoreo/listaContratos');
    }

    public function finalizarEdicion($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->edicion = false;
        $contrato->update();

        return redirect('imonitoreo/listaContratos');
    }
    //-----------------------------------------------------------------------
    //---------------------------SUCURSALES----------------------------------
    //-----------------------------------------------------------------------


    public function guardarSucursal(Request $request){
        $sucursal = new Sucursal();
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->contrato_id = $request['contrato_id'];
        $sucursal->save();

        return redirect('imonitoreo/editarContrato/'.$request['contrato_id']);
    }

    public function verSucursal($id){
        return view('vistas.imonitoreo.verSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function editarSucursal($id){
        return view('vistas.imonitoreo.editarSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function actualizarSucursal(Request $request, $id){
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->update();

        return redirect('imonitoreo/editarSucursal/'.$id);
    }

    public function eliminarSucursal($id){
        $sucursal = Sucursal::findOrFail($id);
        $contrato_id = $sucursal->contrato_id;
        $sucursal->delete();

        return redirect(('imonitoreo/editarContrato/'.$contrato_id));
    }
    //-----------------------------------------------------------------------
    //-----------------------------EQUIPO------------------------------------
    //-----------------------------------------------------------------------

    public function nuevoEquipo($sucursal_id){
        return view('vistas.imonitoreo.nuevoEquipo',[
            'sucursal_id' => $sucursal_id,
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function guardarEquipo(Request $request){
        $equipo = new Equipo();
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->presion_min = $request['presion_min'];
        $equipo->presion_max = $request['presion_max'];
        $equipo->sucursal_id = $request['sucursal_id'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        $equipo->save();

        return redirect('imonitoreo/editarSucursal/'.$request['sucursal_id']);
    }
    public function verEquipo($id){
        return view('vistas.imonitoreo.verEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function editarEquipo($id){
        return view('vistas.imonitoreo.editarEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function actualizarEquipo(Request $request, $id){
        $equipo = Equipo::findOrFail($id);
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->presion_min = $request['presion_min'];
        $equipo->presion_max = $request['presion_max'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        $equipo->save();

        return redirect('imonitoreo/editarSucursal/'.$equipo->sucursal_id);
    }

    public function eliminarEquipo($id){

        $equipo = Equipo::findOrFail($id);
        $sucursal_id = $equipo->sucursal_id;
        $equipo->delete();

        return redirect(('imonitoreo/editarSucursal/'.$sucursal_id));

    }



    //-----------------------------------------------------------------------
    //-----------------------------AGENDA------------------------------------
    //-----------------------------------------------------------------------

    public function agenda(){
        return view('vistas.imonitoreo.agenda');
    }
}
