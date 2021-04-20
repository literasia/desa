<?php

use App\{Role, User};
use App\Models\Citizen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $superadmin = Role::where('name', 'superadmin')->first();
        $admin = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();
        $employee = Role::where('name', 'employee')->first();

        $superadmins = User::create([
            'name'      => 'Superadmin',
            'username'  => 'superadmin',
            'password'  => bcrypt('superadmin'),
        ]);

        $admins = User::create([
            'village_id' => '1212260003',
            'name'      => 'Admin',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
        ]);

        $employees = User::create([
            'village_id' => '1212260003',
            'name'      => 'Hiroko',
            'username'  => 'hiroko',
            'password'  => bcrypt('hiroko'),
        ]);

        $users = User::create([
            'village_id'=> '1212260003',
            'name'      => 'Jho Kowie',
            'email'     => 'jho_kowie@gmail.com',
            'username'  => '12347890',
            'password'  => bcrypt('desaberkarya'),
        ]);

        $citizen                = new Citizen;
        $citizen->user_id       = $users->id;
        $citizen->name          = $users->name;
        $citizen->nik           = $users->username;
        $citizen->no_kk         = '1234789011';
        $citizen->email         = $users->email;
        $citizen->phone         = '081234567890';
        $citizen->province_id   = $users->village->district->regency->province->id;
        $citizen->regency_id    = $users->village->district->regency->id;
        $citizen->district_id   = $users->village->district->id;
        $citizen->village_id    = $users->village_id;
        $citizen->save();
        
        $superadmins->roles()->attach($superadmin);
        $admins->roles()->attach($admin);
        $employees->roles()->attach($employee);
        $users->roles()->attach($user);
    }
}
