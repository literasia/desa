<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domiciles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('village_id');
            $table->string('name');
            $table->string('nik');
            $table->string('no_phone');
            $table->string('address');
            $table->string('image');
            $table->enum('status', ['processing', 'success', 'rejected']);
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
        Schema::dropIfExists('domiciles');
    }
}
