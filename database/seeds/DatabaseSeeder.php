<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RootSeeder::class);
        $this->call(EgresadosSeeder::class);
        $this->call(PermissionAsignationSeeders::class);
        $this->call(CategorySeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(PostSeeder::class);
        // $this->call(RelationUsersSeeder::class);

    }
}
