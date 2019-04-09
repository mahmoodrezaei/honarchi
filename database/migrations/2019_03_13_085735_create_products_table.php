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
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('gallery_id')->nullable();
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('intro')->nullable();
            $table->text('description')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('price')->nullable();
            $table->string('special_price')->nullable();
            $table->string('major_price')->nullable();
            $table->integer('no')->nullable();
            $table->integer('major_no')->nullable();
            $table->json('features')->nullable();
            $table->string('location')->nullable();
            $table->json('pics')->nullable();
            $table->float('rate',2,2)->default(00.00);
            $table->integer('max_purchase_per_rate')->default(0);
            $table->boolean('has_multiple_types')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');

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
