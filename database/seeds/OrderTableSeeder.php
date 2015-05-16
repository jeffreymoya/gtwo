<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class OrderTableSeeder extends Seeder {

    public function run()
    {
        DB::table('orders')->delete();
        DB::table('payments')->delete();
    }

}