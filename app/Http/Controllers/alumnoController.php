<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use App\Models\alumno;
use Carbon\Carbon;

class alumnoController extends Controller
{
/**
    * Este controlador usara midleware de autentificación
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registro(alumno $dato)
    {
        /*$html2pdf = new Html2pdf('P', 'letter', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        $fecha = Carbon::now()->locale('es');
        $html2pdf->writeHTML(View('imprimir.registro',  compact('dato', 'fecha'))->render());
        return $html2pdf->output('registro de alumnos.pdf');*/
        $fecha = Carbon::now()->locale('es');
        return view('imprimir.registro', compact('dato', 'fecha'));
    }


}
