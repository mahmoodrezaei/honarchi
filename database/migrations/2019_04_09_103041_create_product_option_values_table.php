<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('option_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('product_option')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option_values');
    }
}
