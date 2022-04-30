<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class espSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new Especialidad() ;
        $user->nombre = 'Medico General';
        $user->descripcion = 'Es un medico general';
        $user->save();

        $user=new Especialidad() ;
        $user->nombre = 'Pediatria';
        $user->descripcion = 'pediatriaaaaaaa';
        $user->save();
    }
}
