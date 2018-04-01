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
        DB::table('categories')->insert([
            'categorie' => 'Vaste planten',
            'parent_id' => null
        ]);
        DB::table('categories')->insert([
            'categorie' => 'Bladplanten',
            'parent_id' => 1
        ]);
        DB::table('categories')->insert([
            'categorie' => 'Lavendel',
            'parent_id' => 1
        ]);
        DB::table('categories')->insert([
            'categorie' => 'Varens',
            'parent_id' => 1
        ]);
    }
}
