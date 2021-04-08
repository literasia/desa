<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_permits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('village_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('address');
            $table->enum('status', ['processing', 'rejected', 'success']);
            // $table->foreign('village_id')->on('indoregion_villages')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('business_permits');
    }
}
