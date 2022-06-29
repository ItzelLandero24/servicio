<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calificacione;

class calificacioneController extends Controller
{
    /**
    * Este controlador usara midleware de autentificación
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear(Request $request)
    {
        $curso = $request->input('alumno');
        $parcial = $request->input('parcial');
        foreach ($request->input('materias') as $materiaid => $calificacion) {
            if (!is_null($calificacion)){
                Calificacione::create([
                    'alumno_id' => $alumno,
                    'materia_id' => $materiaid,
                    'parcial' => $parcial,
                    'calificacion' => $calificacion,
                ]);
            }
        }
        return redirect('admin/alumnos/'.$alumno)->with(['message' => "Se agregaron calificaciones con exito", 'alert-type' => 'success']);
    }
}
