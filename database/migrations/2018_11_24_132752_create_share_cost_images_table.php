<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareCostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_cost_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('filename');
            $table->text('resized_name');
            $table->text('original_name');
            $table->unsignedInteger('share_cost_id')->nullable();
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
        Schema::dropIfExists('share_cost_images');
    }
}
