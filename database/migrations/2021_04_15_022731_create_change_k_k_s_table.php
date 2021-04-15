<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeKKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_k_k_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('village_id');
            $table->string('name');
            $table->bigInteger('no_phone');
            $table->text('address');
            $table->text('image_ktp');
            $table->enum('status', ['processing','success','rejected']);
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
        Schema::dropIfExists('change_k_k_s');
    }
}
