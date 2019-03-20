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
            $table->string('name');
            $table->string('intro');
            $table->text('description');
            $table->string('purchase_price');
            $table->string('price');
            $table->string('special_price');
            $table->string('major_price');
            $table->integer('no');
            $table->integer('major_no');
            $table->json('features');
            $table->string('location');
            $table->json('pics');
            $table->float('rate',2,2)->default(00.00);
            $table->integer('max_purchase_per_rate')->default(0);
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
