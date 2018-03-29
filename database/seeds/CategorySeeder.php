<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<9;$i++){
            DB::table('categories')->insert([
                'categorie' => 'Categorie '. $i
            ]);
        }
    }
}
