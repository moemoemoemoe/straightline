<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiealdToPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('cat_id');
            $table->text('title');
            $table->text('description');
            $table->integer('hotel_id');//important
            $table->integer('day');
          $table->integer('night');

            $table->integer('theme_id');
            $table->integer('cont_id');
            $table->text('map_loc');
            $table->string('main_image');
            $table->text('detailed');
            $table->string('depart_date');
            $table->string('revenu_date');
            $table->string('price');
            $table->text('price_included');
            $table->text('brochur_url');
            $table->integer('status');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
