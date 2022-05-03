<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{

    use HasFactory;
    protected $table='consulta';
    protected $fillable = ['descripcion', 'fecha','hora','id_medico','id_paciente'];
}
