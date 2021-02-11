<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoEquipo extends Model
{
    /**
     *************************************************************************
     * Clase.........: EstadoEquipo
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "estado_equipo" en la BD.
     * Fecha.........: 10-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'estado_equipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'presion',
        'longitud',
        'latitud',
        'equipo_id',
    ];
}
