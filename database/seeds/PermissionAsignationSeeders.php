<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class PermissionAsignationSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_egresado = Role::where('name','Egresados')->first();
        $role_egresado->givePermissionTo('contenido.index','contenido.show','egresados.show');

        $role_admin = Role::where('name','Admin')->first();
        $role_admin->givePermissionTo('egresados.index','egresados.show','egresados.edit'
        ,'egresados.destroy','contenido.index','contenido.show',
        'contenido.create','contenido.edit','contenido.destroy'); 




    }
}
