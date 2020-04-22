<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table ->id();
            $table ->string('tipo_documento');
            $table ->integer('documento');            
            $table ->integer('edad');
            $table ->string('pais');
            $table ->string('descripcion',600);
            $table ->string('programa');
            $table ->string('genero');
            $table ->string('foto')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresados');
    }
}
