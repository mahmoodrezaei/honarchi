<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageProductVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image_product_variant', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_variant_id');
            $table->unsignedInteger('product_image_id');

            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->foreign('product_image_id')->references('id')->on('product_image');

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
        Schema::dropIfExists('product_image_product_variant');
    }
}
