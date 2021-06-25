<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmbedMapsToVillageProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');

            $table->text('embed_maps')->after('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            //
        });
    }
}
