<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = array(
            ['Producten', 'producten', '10'],
            ['Winkelwagen', 'winkelwagen', '10'],
            ['Admin', 'admin', '2'],
            ['Account', 'account', '1'],
            ['Uitloggen', 'uitloggen', '1'],
            ['Inloggen', 'inloggen', '0'],
            ['Registreren', 'registreren', '0']
        );

        foreach($menuItems as $item){
            DB::table('menu')->insert([
                'label' => $item[0],
                'path' => $item[1],
                'user_level' => $item[2]
            ]);
        }
    }
}
