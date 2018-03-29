<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<8;$i++){
            DB::table('users')->insert([
                'name' => 'name #'. $i,
                'email' => 'email'. $i . '@email.com',
                'password' => bcrypt('password'. $i)
            ]);
        }
    }
}
