<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('village_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('employee_id'); 
            $table->string('level');
            $table->string('status');
            $table->text('description');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            // $table->foreign('village_id')->on('villages')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('village_structures');
    }
}
