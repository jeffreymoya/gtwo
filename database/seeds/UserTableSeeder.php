<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Address;
use App\Role;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('addresses')->delete();
    	DB::table('roles')->delete();
        DB::table('users')->delete();
    	DB::table('referrals')->delete();

    	$address = Address::create(['city'=>'Manila','Country'=>'PH']);
    	$role_1 = Role::create(['name'=>'Admin']);
    	$role_2 = Role::create(['name'=>'Member']);

        User::create(['user_id'=>'sponsor@abc.com','role_id'=>$role_2->id, 'address_id'=>$address->id, 'first_name'=>'Sponsor','last_name'=>'User','phone'=>'12345','password'=>Hash::make('password')]);
        User::create(['user_id'=>'admin@abc.com','role_id'=>$role_1->id, 'address_id'=>$address->id, 'first_name'=>'Admin','last_name'=>'User','phone'=>'12345','password'=>Hash::make('password')]);
    }

}