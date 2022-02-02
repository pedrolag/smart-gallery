<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImagesCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('images_id');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            $table->foreign('images_id')
                ->references('id')
                ->on('images');
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_categories');
    }
}
