<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    /**
     *************************************************************************
     * Clase.........: Empleado
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "empleado" en la BD.
     * Fecha.........: 06-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'empleado';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'apellido',
        'carnet',
        'telefono',
        'direccion',
        'email',
    ];

}
