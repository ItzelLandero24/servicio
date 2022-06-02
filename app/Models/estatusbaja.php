<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estatusbaja extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $additional_attributes = ['NombreCompleto'];


    public function getNombreCompletoAttribute()
    {
        return $this->Clave.' - '.$this->Estatus;
    }
}
