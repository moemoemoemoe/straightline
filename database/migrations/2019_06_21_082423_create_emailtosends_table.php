<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailtosendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailtosends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_id')->comment = "1->(contactus), 2->(reservation pack), 3->(callback)";
            $table->text('emails')->comment = "emails separate with ,";
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
        Schema::dropIfExists('emailtosends');
    }
}
