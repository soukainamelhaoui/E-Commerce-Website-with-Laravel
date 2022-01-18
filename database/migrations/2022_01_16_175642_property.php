<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Schema::disableForeignKeyConstraints();

class Property extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('property')){
            Schema::create('property', function (Blueprint $table) {
                $table->id('id_property');
                $table->string('title');
                $table->string('type');
                $table->float('price');
                $table->string('country');
                $table->string('city');
                $table->string('image');
                $table->string('description');
                $table->integer('available_rooms');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
