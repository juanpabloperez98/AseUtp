<?php

use Illuminate\Database\Seeder;
use App\Egresados;

class EgresadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Egresados::class,30)->create();

        Egresados::create([

            'tipo_documento'=>'cedula ciudadanía',
            'documento'=> 1088035376,
            'edad'=> 21,
            'pais'=> 'Colombia',
            'descripcion'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed amet, alias architecto dolor exercitationem soluta, inventore officia a at quas sapiente autem? Quam, omnis. Amet tempora quibusdam sed neque quos.',
            'programa'=> 'Ingenierias',
            'genero'=> 'Masculino',
            'user_id' => 31

        ]);
    }
}
