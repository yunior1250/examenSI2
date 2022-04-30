<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User() ;
        $user->name='Admin';
        $user->email='admin@gmail.com';

        $user->password=bcrypt('1234');//bcrypt encripta la contraseña

        $user->save();//save con  parentesis
        $user->assignRole('Administrador');
    }
}
