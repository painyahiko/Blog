<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Rol::create(['rol' => 'Registrado']);
        Rol::create(['rol' => 'editor']);
        Rol::create(['rol' => 'autor']);
        Rol::create(['rol' => 'admin']);

    }
}
