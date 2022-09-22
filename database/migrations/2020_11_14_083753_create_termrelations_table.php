<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termrelations', function (Blueprint $table) {
         $table->unsignedBigInteger('term_id');
         $table->unsignedBigInteger('child_id');
        
         $table->foreign('term_id')
         ->references('id')->on('terms')
         ->onDelete('cascade');

          $table->foreign('child_id')
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
        Schema::dropIfExists('termrelations');
    }
}
