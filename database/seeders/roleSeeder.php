<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1= Role::create(['name'=>'Administrador']);
        $rol2= Role::create(['name'=>'Paciente']);
        $rol3= Role::create(['name'=>'Medico']);
        Permission::create(['name'=>'Gestionar Perfil'])->syncRoles([$rol1, $rol3]) ;



        Permission::create(['name'=>'Gestionar Administrador'])->syncRoles([$rol1]) ;
        Permission::create(['name'=>'Gestionar Paciente'])->syncRoles([$rol2]) ;
        Permission::create(['name'=>'Gestionar Medico'])->syncRoles([$rol3]) ;

    }

}
