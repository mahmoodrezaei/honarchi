<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gallery_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->float('rate',2,2)->default(00.00);
            $table->integer('max_purchase_per_rate')->default(0);
            $table->dateTime('published_date')->nullable();
            $table->timestamps();
            $table->boolean('enabled')->default(false);
            $table->boolean('is_simple')->default(true);
            $table->boolean('trashed')->default(false);

            $table->foreign('gallery_id')->references('id')->on('galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
