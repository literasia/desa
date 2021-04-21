<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovedInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moved_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('village_id');
            $table->string('name');
            $table->string('phone_number');
            $table->text('address');
            $table->enum('status', ['processing', 'rejected', 'success']);
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
        Schema::dropIfExists('moved_information');
    }
}
