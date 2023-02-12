<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('ar_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('type')->default(0);
            //$table->text('content')->nullable();
            $table->unsignedBigInteger('p_id')->nullable();
            $table->double('featured')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(1);
            $table->string('land_arae')->nullable();
            $table->string('buildup_arae')->nullable();
            $table->string('property_age')->nullable();
            $table->string('features_section')->nullable();
            $table->string('furnishing_section')->nullable();
            $table->string('total_floor')->nullable();
            $table->string('property_floor')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('categories');
    }
}
