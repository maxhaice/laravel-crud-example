<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBindingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binding', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('point_1_id');
            $table->unsignedInteger('point_2_id');


            $table->foreign('point_1_id')
                ->references('id')
                ->on('point')
                ->onDelete('cascade');

            $table->foreign('point_2_id')
                ->references('id')
                ->on('point')
                ->onDelete('cascade');

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
        Schema::dropIfExists('binding');
    }
}
