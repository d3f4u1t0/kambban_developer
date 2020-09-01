<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table){
           $table->bigIncrements('id')->comment('Identificador unico');
           $table->string('description')->comment('Descripción del request');

           $table->unsignedBigInteger('user_id')->comment('Referencia directa a la tabla de usuarios');
           $table->foreign('user_id')->references('id')->on('users');

           $table->unsignedBigInteger('requesttype_id')->comment('Referencia directa a la tabla de ripo de request');
           $table->foreign('requesttype_id')->references('id')->on('requests_types');

           $table->unsignedBigInteger('category_id')->comment('Referencia directa a la tabla categorias');
           $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('requests');
    }
}
