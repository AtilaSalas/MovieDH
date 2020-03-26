<?php

use Illuminate\Database\Seeder;

class SeederDeRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        ['name' => 'usuario'],
        ['name' => 'administrador']
      ]);
    }
}
