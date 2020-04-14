<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // egresados
        Permission::create([
            'name'=>'Navegar egresados',
            'slug'=>'egresados.index',
            'description'=>'Lista y navega todos los egresados del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de egresados',
            'slug'=>'egresados.show',
            'description'=>'Ver en detalle cada egresado del sistema'
        ]);
        Permission::create([
            'name'=>'Edicion egresados',
            'slug'=>'egresados.edit',
            'description'=>'Editar cualquier dato de un egresado del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar egresados',
            'slug'=>'egresados.destroy',
            'description'=>'Eliminar cualquier egresado del sistema'
        ]);

        // admin
        Permission::create([
            'name'=>'Navegar admins',
            'slug'=>'admin.index',
            'description'=>'Lista y navega todos los admins del sistema'
        ]);
        Permission::create([
            'name'=>'Ver detaller de admin',
            'slug'=>'admin.show',
            'description'=>'Ver en detalle cada admin del sistema'
        ]);
        Permission::create([
            'name'=>'Creacion de admins',
            'slug'=>'admin.create',
            'description'=>'Crear cualquier dato de un admin del sistema'
        ]);
        Permission::create([
            'name'=>'Edicion admins',
            'slug'=>'admin.edit',
            'description'=>'Editar cualquier dato de un admin del sistema'
        ]);
        Permission::create([
            'name'=>'Eliminar admin',
            'slug'=>'admin.destroy',
            'description'=>'Eliminar cualquier admin del sistema'
        ]);

        // Contenido

        Permission::create([
            'name'=>'Navegar contenido',
            'slug'=>'contenido.index',
            'description'=>'Lista y navega todos los contenidos del sistema'
        ]);
        Permission::create([
            'name'=>'Ver detaller de contenido',
            'slug'=>'contenido.show',
            'description'=>'Ver en detalle cada contenido del sistema'
        ]);
        Permission::create([
            'name'=>'Creacion de contenido',
            'slug'=>'contenido.create',
            'description'=>'Crear cualquier contenido del sistema'
        ]);
        Permission::create([
            'name'=>'Edicion contenido',
            'slug'=>'contenido.edit',
            'description'=>'Editar cualquier contenido del sistema'
        ]);
        Permission::create([
            'name'=>'Eliminar contenido',
            'slug'=>'contenido.destroy',
            'description'=>'Eliminar cualquier contenido del sistema'
        ]);




    }
}
