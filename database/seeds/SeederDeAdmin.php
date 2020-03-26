<?php

use Illuminate\Database\Seeder;

class SeederDeAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$pMEQkUMWAZYW8hy124ZAIeGPQExbmKVaHOZNamrbaEyFKtUccW9Sy',
            'rol_id' => 2
          ],
        ]);
    }
}
