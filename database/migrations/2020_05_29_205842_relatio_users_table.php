<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelatioUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('relation_users', function(Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('egresado_id');
            $table->enum('status',['FRIENDS','LOCKED'])->default('FRIENDS');
            



            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('egresado_id')->references('id')->on('egresados')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_users');
    }
}
