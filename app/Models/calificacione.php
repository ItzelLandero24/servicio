<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificacione extends Model
{
    use HasFactory;
    protected $fillable = ['materia_id', 'parcial', 'calificacion', 'alumno_id'];
    public function alumno()
    {
        return $this->belongsTo(alumno::class);
    }

    function getalumnoIdBrowseAttribute()
    {
        return $this->alumno->nombre;
    }
}
