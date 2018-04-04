<?php

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<6;$i++){
            DB::table('order_product')->insert([
                'order_id' => $i,
                'product_id' => $i,
                'amount' => 2
            ]);
        }
    }
}
