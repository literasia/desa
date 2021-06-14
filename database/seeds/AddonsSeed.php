<?php

use Illuminate\Database\Seeder;
use App\Models\Addon;


class AddonsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $addons = Addon::create([
            "village_id" => 1212260003,
            "admin_id" => 2,
            "administration"=>1,
            "announcement"=>1,
            "attendance"=>1,
            "calendar"=>1,
            "campaign"=>1,
            "complaint"=>1,
            "dashboard"=>1,
            "event"=> 1,
            "finance"=>1,
            "guest_book"=>1,
            "library"=>1,
            "log_user"=>1,
            "news"=>1,
            "population_data"=>1,
            "reference"=>1,
            "slider"=>1,
            "template"=>1,
            "village_potency"=>1,
            "village_profile"=>1,
            "village_structure"=>1,
            "village_tour"=>1,
            "social_assistance"=>1,
            "greeting"=>1,
            "community"=>1,
            "awareness"=>1,
            "development"=>1
        ]);
    }
}
