<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Super User',
            'slug'=>'superuser',
            'special'=>'all-access',
        ]);

        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>null,
        ]);

        Role::create([
            'name'=>'Egresados',
            'slug'=>'egresados',
            'special'=>null,
        ]);
        
    }
}
