<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'Admin Ecommerce',
              'email' 			=> 'admin@gmail.com',
              'password'		=> bcrypt('rahasia'),
              'gambar'			=> NULL,
              'admin'			=> 1,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'name'  			=> 'User Ecommerce',
              'email' 			=> 'member@gmail.com',
              'password'		=> bcrypt('rahasia'),
              'gambar'			=> NULL,
              'admin'			=> NULL,
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
