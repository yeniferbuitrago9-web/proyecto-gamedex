<?php

namespace App\Enums;

enum TipoTransaccion: string
{
    case VENTA = 'venta';
    case INTERCAMBIO = 'intercambio';
}