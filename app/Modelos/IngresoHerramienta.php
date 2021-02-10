<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: Categoria
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "categoria" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'ingreso_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'tienda',
        'nro_factura',
        'foto_factura',
    ];

    public function detalles(){
        return $this->hasMany(DetalleIngresoHerramienta::class);
    }
}
