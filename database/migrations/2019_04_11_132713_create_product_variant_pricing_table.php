<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_pricing', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_variant_id');
            $table->json('configuration');

            $table->foreign('product_variant_id')->references('id')->on('product_variants')->delete('cascade');

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
        Schema::dropIfExists('product_variant_pricing');
    }
}
