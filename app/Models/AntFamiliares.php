<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntFamiliares extends Model
{

    use HasFactory;
    protected $table='antfamiliares';
    protected $fillable = ['inspecciongeneral','peso', 'altura','temperatura','aspecto'];

}
