<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            $faker = Faker::create();
            DB::table('reserveringen')->insert([
                'reserveernummer' => 12345678+$i,
                'datum' => $faker->date(),
                'aantalgasten' => 6,
                'klantnummer' => 1000+$i,
            ]);
             DB::table('klantgegevens')->insert([
                'klantnummer' => 1000+$i,
                'voornaam' => $faker->firstName(),
                'tussenvoegsel' => '',
                'achternaam' => 'haoo',
                'voorletter' => $faker->randomLetter(),
                'adres' => $faker->address(),
                'postcode' => '7d',
                'plaats' => $faker->city(),
                'email' => $faker->email(),
            ]);


            DB::table('producten')->insert([
                'productnummer' => 2400+$i,
                'productomschrijving' => $faker->firstName(),
                'prijs' => '20,00'
            ]);
            DB::table('bestellingen')->insert([
                'device' => 1+$i,
                'timestamp' => 21578,
                'productnummer' => 2400+$i,
                'prijsbetaald' => '0,00',
                'aantalbesteld' => 2,
                'reserveernummer' => 12345678+$i,

            ]);

             DB::table('tafelgegevens')->insert([
                'tafelnummer' => 1,
                'aantalstoelen' => 2,
                'status' => 1,
            ]);
             DB::table('tafelreserveringen')->insert([
                 'tafelnummer' => 1+$i,
                 'reserveernummer' => 12345678+$i,
                 'tijdin' => '17.00',
                 'tijduit' => '19.00',

            ]);









      }
    }
}
