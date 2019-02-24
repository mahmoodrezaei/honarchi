<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover_title');
            $table->text('cover_body');
            $table->string('cover_img');
            $table->string('title');
            $table->text('body');
            $table->string('img');
            $table->string('address');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('instagram');
            $table->string('telegram');
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
        Schema::dropIfExists('abouts');
    }
}
