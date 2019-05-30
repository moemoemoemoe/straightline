<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationpacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservationpacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('package_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('traveller_number');
            $table->string('dep_date');
            $table->string('return_date');
            $table->text('message');
            $table->string('status');
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
        Schema::dropIfExists('reservationpacks');
    }
}
