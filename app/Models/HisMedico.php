<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HisMedico extends Model
{

    use HasFactory;
    protected $table='hismedico';
    protected $fillable = ['fechanaci', 'ocupacion','estadocivil','id_paciente','id_antpersonales', 'id_antfamiliares'];
}

