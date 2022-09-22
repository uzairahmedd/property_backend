<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryrelations', function (Blueprint $table) {
         $table->unsignedBigInteger('parent_id');
         $table->unsignedBigInteger('child_id');
         $table->foreign('parent_id')
         ->references('id')->on('categories')
         ->onDelete('cascade');
         $table->foreign('child_id')
         ->references('id')->on('categories')
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
        Schema::dropIfExists('categoryrelations');
    }
}
