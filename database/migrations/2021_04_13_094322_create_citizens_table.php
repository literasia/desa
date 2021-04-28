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
            $table->enum("marital_status", ["single", "married", "divorced", "death_divorced"])->nullable();
            $table->enum("family_status", ["father", 
                                           "mother", 
                                           "child", 
                                           "son_in_law",
                                           "grandchild",
                                           "in_laws",
                                           "other_family",
                                           "etc"])->nullable();
            $table->enum("work_type", [ "housewife",
                                        "student",
                                        "retired",
                                        "government_employee",
                                        "honorary_employee",
                                        "police",
                                        "army",
                                        "farmer",
                                        "cattleman",
                                        "fisherman",
                                        "industry",
                                        "construction",
                                        "transportation",
                                        "street_vendors",
                                        "laborer",
                                        "housemaid",
                                        "barber",
                                        "electrican",
                                        "bricklayer",
                                        "carpenter",
                                        "cobler",
                                        "blacksmith",
                                        "tailor",
                                        "hairdresser",
                                        "makeup_man",
                                        "fashion_stylist",
                                        "mechanics",
                                        "dentist",
                                        "artist",
                                        "physician",
                                        "fashion_designer",
                                        "translator",
                                        "mosque_imam",
                                        "pastor",
                                        "journalists",
                                        "chef",
                                        "president",
                                        "vice_president",
                                        "members_of_the_supreme_court",
                                        "members_of_cabinet_minister",
                                        "ambassador",
                                        "governor",
                                        "deputy_governor",
                                        "regent",
                                        "vice_regent",
                                        "mayor",
                                        "vice_mayor",
                                        "lecturer",
                                        "teacher",
                                        "pilot",
                                        "lawyer",
                                        "notary_public",
                                        "arsitect",
                                        "accountant",
                                        "consultant",
                                        "doctor",
                                        "nurse",
                                        "midwife",
                                        "pharmacist",
                                        "psychiatrist",
                                        "television_broadcaster",
                                        "radio_announcer",
                                        "sailor",
                                        "researcher",
                                        "driver",
                                        "broker",
                                        "paranormal",
                                        "trader",
                                        "village_apparatus",
                                        "village_head",
                                        "nun",
                                        "etc"])->nullable();
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
            $table->integer('is_head_of_family')->default(0);
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
