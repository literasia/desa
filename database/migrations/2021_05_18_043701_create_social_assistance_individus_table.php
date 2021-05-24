<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAssistanceIndividusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_assistance_individus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('social_assistance_type_id');
            $table->unsignedBigInteger('citizen_id');
            $table->integer('village_id');
            $table->string('id_art');
            $table->string('id_dtks');
            $table->foreign('social_assistance_type_id')->references('id')->on('social_assistance_types')->onDelete('cascade');
            $table->foreign('citizen_id')->references('id')->on('citizens')->onDelete('cascade');
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
        Schema::dropIfExists('social_assistance_individus');
    }
}
