<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('reservation')){
            Schema::create('reservation', function (Blueprint $table) {
                $table->id('id_reservation');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->integer('number');
                
                $table->integer('guests');
                
                $table->date('check_in');
                $table->date('check_out');
                $table->string('special_requests');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('property_id');
                $table->foreign('property_id')->references('id_property')->on('property')->onDelete('cascade');
               
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
        Schema::dropIfExists('reservation');
    }
}