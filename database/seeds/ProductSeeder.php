<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('producten')->insert([
            'productnummer' => 2400,
            'productomschrijving' => 'Soep van de dag',
            'prijs' => 4.00,
            'categorie' => 'voorgerecht'
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2401,
            'productomschrijving' => 'Wienerschnitzel met saus naar keuze.',
            'prijs' => 2.00,
            'categorie' => 'hoofdgerecht'
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2402,
            'productomschrijving' => 'Macaroni met ham en kaas.',
            'prijs' => 2.00,
            'categorie' => 'overige hoofdgerechten'
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2403,
            'productomschrijving' => 'lekker',
            'prijs' => 2.00,
            'categorie' => 'nagerecht'
        ]);
        DB::table('producten')->insert([
            'productnummer' => 2404,
            'productomschrijving' => 'drank',
            'prijs' => 2.00,
            'categorie' => 'dranken'
        ]);

    }
}
