<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntPersonales extends Model
{

    use HasFactory;
    protected $table='antpersonales';
    protected $fillable = ['tabaco', 'droga','alimentacion','sueño','sexualidad','enfermedades','respiratorio'
    ,'traumatologico','quirurgico','alergico'];
}

