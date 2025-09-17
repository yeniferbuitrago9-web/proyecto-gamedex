<?php

namespace App\Enums;

enum TipoTransaccion: string
{
    case COMPRA = 'compra';
    case VENTA = 'venta';
    case INTERCAMBIO = 'intercambio';
}