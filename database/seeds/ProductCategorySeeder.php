<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'category_name' => 'Voorgerecht'
        ]);
        DB::table('product_categories')->insert([
            'category_name' => 'Hoofdgerecht'
        ]);
        DB::table('product_categories')->insert([
            'category_name' => 'Overige hoofdgerechten'
        ]);
    }
}
