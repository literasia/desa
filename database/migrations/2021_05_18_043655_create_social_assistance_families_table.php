<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAssistanceFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_assistance_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('social_assistance_type_id');
            $table->unsignedBigInteger('family_id');
            $table->integer('village_id');
            $table->string('id_art');
            $table->string('id_dtks');
            $table->foreign('social_assistance_type_id')->references('id')->on('social_assistance_types')->onDelete('cascade');
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
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
        Schema::dropIfExists('social_assistance_families');
    }
}
