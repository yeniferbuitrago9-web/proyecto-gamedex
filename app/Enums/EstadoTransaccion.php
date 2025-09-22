<?php

namespace App\Enums;

enum EstadoTransaccion: string
{
    case PENDIENTE = 'pendiente';
    case APROBADA = 'aprobada';
    case FALLIDA = 'fallida';
    case REVERSA = 'reversa';
}