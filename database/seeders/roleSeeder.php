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
        permission::create(['name'=>'Gestionar Usuarios'])->syncRoles([$rol1]) ;
        permission::create(['name'=>'Gestionar Pacientes'])->syncRoles([$rol1]) ;
        permission::create(['name'=>'Gestionar Medicos'])->syncRoles([$rol1, $rol3]) ;
        permission::create(['name'=>'Gestionar Roles'])->syncRoles([$rol1]) ;
        permission::create(['name'=>'Gestionar Citas'])->syncRoles([$rol1, $rol3, $rol2]) ;
        permission::create(['name'=>'Gestionar Historias Medicas'])->syncRoles([$rol1, $rol3, $rol2]);
        permission::create(['name'=>'Medico'])->syncRoles([$rol3]);
        permission::create(['name'=>'Admin'])->syncRoles([$rol1]);
        permission::create(['name'=>'Paciente'])->syncRoles([$rol2]);
        

    }
}
