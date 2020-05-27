<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class,29)->create();
            
        User::create([
            'name' => 'root',
            'last_name' => 'root',            
            'email' => 'root@gmail.com',
            'password' => Hash::make('root123'),                        
            'tipo_usuario' => 'root',
            'clave' => 1234,
            'pass_recovery' => 'root123'
        ]);
    }
}
