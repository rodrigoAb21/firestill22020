<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Herramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: Herramienta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "herramienta" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'cantidad_taller',
        'cantidad_asignada',
        'cantidad_total',
        ];
}
