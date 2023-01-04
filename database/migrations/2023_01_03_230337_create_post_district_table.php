<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_district', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('term_id');
            $table->string('type');
            $table->string('value')->nullable();
           
            $table->foreign('district_id')
            ->references('id')->on('districts')
            ->onDelete('cascade');
            $table->foreign('term_id')
            ->references('id')->on('terms')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_district');
    }
}
