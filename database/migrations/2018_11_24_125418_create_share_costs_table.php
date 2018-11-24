<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->unsignedInteger('user_id');
            $table->date('end_time');
            $table->string('contact', 20);
            $table->string('wa_contact', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('share_costs');
    }
}
