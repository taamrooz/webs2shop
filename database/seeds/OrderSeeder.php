<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<9;$i++){
            DB::table('orders')->insert([
                'user_id' => $i
            ]);
        }
    }
}
