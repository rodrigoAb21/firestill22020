<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    /**
     *************************************************************************
     * Clase.........: Equipo
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "equipo" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'equipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'descripcion',
        'ano_fabricacion',
        'presion_min',
        'presion_max',
        'longitud',
        'latitud',
        'sucursal_id',
        'tipo_clasificacion_id',
        'marca_clasificacion_id',
    ];
}
