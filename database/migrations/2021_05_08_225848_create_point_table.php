<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);
            $table->unsignedInteger('prev_id');
            $table->unsignedInteger('next_id');
            $table->integer('x');
            $table->integer('y');

            $table->unsignedInteger('branch_id');


            $table->foreign('branch_id')
                ->references('id')
                ->on('branch')
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
        Schema::dropIfExists('point');
    }
}
