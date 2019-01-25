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
        DB::table('producten')->insert([
            'productnummer' => 2400,
            'productomschrijving' => 'Soep van de dag',
            'prijs' => 4.00,
            'category_id' => 1
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2401,
            'productomschrijving' => 'Gerookte zalm op een bedje van basilicum',
            'prijs' => 8.50,
            'category_id' => 1
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2402,
            'productomschrijving' => 'Licht gezouten carpaccio met schijfjes buffelmozzarella',
            'prijs' => 9.00,
            'category_id' => 1

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2403,
            'productomschrijving' => 'Buffelmozzarella met tomaat en basilicumpesto',
            'prijs' => 7.00,
            'category_id' => 1

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2404,
            'productomschrijving' => 'Wienerschnitzel met saus naar keuze',
            'prijs' => 16.00,
            'category_id' => 2

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2405,
            'productomschrijving' => 'Kaasschnitzel van oude kaas met verse peterselieknoflookpesto',
            'prijs' => 12.00,
            'category_id' => 2

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2406,
            'productomschrijving' => 'Gerookte kipfilet met whiskysaus',
            'prijs' => 16.00,
            'category_id' => 2
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2407,
            'productomschrijving' => 'Tournedos met kruidenboter',
            'prijs' => 23.00,
            'category_id' => 2

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2408,
            'productomschrijving' => 'Macaroni met ham en kaas',
            'prijs' => 8.00,
            'category_id' => 3

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2409,
            'productomschrijving' => 'Pizza Margarita',
            'prijs' => 6.00,
            'category_id' => 3

        ]);
        DB::table('producten')->insert([
            'productnummer' => 2410,
            'productomschrijving' => 'Pizza flex (met 2 toppings naar keuze: kaas, spek, ham, tomaat, ui, mozzarella)',
            'prijs' => 10.00,
            'category_id' => 3
        ]);
    }
}