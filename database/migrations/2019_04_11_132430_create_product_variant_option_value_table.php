<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantOptionValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_option_value', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_variant_id');
            $table->unsignedInteger('product_option_value_id');

            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->foreign('product_option_value_id')->references('id')->on('product_option_values');

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
        Schema::dropIfExists('variant_option_value');
    }
}
