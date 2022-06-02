<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use App\Models\baja;
use Carbon\Carbon;

class bajaController extends Controller
{
/**
    * Este controlador usara midleware de autentificación
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function baja(baja $dato)
    {

        $fecha = Carbon::now()->locale('es');
        return view('imprimir.baja', compact('dato', 'fecha'));
    }


}
