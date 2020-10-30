<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ALBERTDEV123',
            'type' => 'fixed',
            'value' => 50,
        ]);

        Coupon::create([
            'code' => 'XYZDEV576',
            'type' => 'percent',
            'percent_off' => 30,
        ]);
}
}
