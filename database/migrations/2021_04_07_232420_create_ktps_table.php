<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('village_id');
            $table->string('name');
            $table->string('number_phone');
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
        Schema::dropIfExists('ktps');
    }
}
