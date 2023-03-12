<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandBlockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_block_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->string('parent_category')->nullable();
            $table->string('price')->nullable();
            $table->string('plot_number')->nullable();
            $table->string('planned_number')->nullable();
            $table->string('total_area')->nullable();
            $table->string('center_coordinate')->nullable();
            $table->string('top_right_coordinate')->nullable();
            $table->string('top_left_coordinate')->nullable();
            $table->string('bottom_right_coordinate')->nullable();
            $table->string('bottom_left_coordinate')->nullable();
            $table->string('right_measurement')->nullable();
            $table->string('left_measurement')->nullable();
            $table->string('top_measurement')->nullable();
            $table->string('bottom_measurement')->nullable();
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
        Schema::dropIfExists('land_block_details');
    }
}
