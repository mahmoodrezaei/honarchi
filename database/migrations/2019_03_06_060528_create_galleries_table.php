<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id')->nullable();
            $table->string('gallery_name')->nullable()->unique();
            $table->string('location');
            $table->string('type');
            $table->text('description')->nullable();
            $table->text('bio')->nullable();
            $table->tinyInteger('state')->default(0); // 0 => unapproved, 1 => approved, -1 => block
            $table->float('rate')->nullable();
            $table->json('samples')->nullable();
            $table->string('cover_path')->nullable();
            $table->string('avatar_path')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
