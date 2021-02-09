<?php

namespace App\Modelos;

use App\User;


class Empleado extends User
{
    public static $TIPOS_DE_USUARIO = ['Administrador', 'Tecnico'];
}
