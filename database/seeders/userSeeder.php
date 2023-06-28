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
        $user->assignRole('Administrador');//asigna un roll al  usuario que guardamos

        /*
        //CREAMOS UN CLIENTE
        $user=new User() ;
        $user->name='Paciente';
        $user->email='paciente@gmail.com';
        $user->password=bcrypt('1234');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        $user->assignRole('Paciente');//asigna un roll al  usuario que guardamos
        // VENDEDOR
        $user=new User() ;
        $user->name='Medico Mogiano';
        $user->email='medico@gmail.com';
        $user->password=bcrypt('1234');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        $user->assignRole('Medico');//asigna un roll al  usuario que guardamos

            */
    }
}
