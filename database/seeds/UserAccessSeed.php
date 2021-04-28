<?php

use App\User;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class UserAccessSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('username', '12347890')->first();
        
        UserAccess::create([
            'user_id'       => $user->id,
            'village_id'    => $user->village_id
        ]);
    }
}
