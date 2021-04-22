<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('no_kk');
            $table->integer('nik');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('citizenship', ["wni", "wna"])->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('sex', ["male", "female"])->nullable();
            $table->enum('religion', ["islam", "christian", "catholic", "hindu", "buddha", "confucianism"])->nullable();
            $table->enum("education", ["sd", "smp", "sma", "d1", "d2", "d3", "s1", "s2", "s3"])->nullable();
            $table->enum("marital_status", ["single", "married", "divorced"])->nullable();
            $table->enum("family_status", ["father", "mother", "child", ""])->nullable();
            $table->enum("work_type", ["employee", "farmer", "housewife", "government_employee", "retired", "student", ""])->nullable();
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('citizens');
    }
}
