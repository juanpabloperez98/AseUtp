<?php

use Illuminate\Database\Seeder;
use App\Root;
use App\User;


class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::findOrFail(1);

        $user->assignRoles('superuser');

        Root::create([            
            'descripcion' => 'Soy el root',
            'user_id' => 1
        ]);
    }
}
