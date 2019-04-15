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
            

             DB::table('tafelgegevens')->insert([
                'tafelnummer' => 1+$i,
                'aantalstoelen' => 2,
                'status' => 1,
            ]);
             DB::table('tafelreserveringen')->insert([
                 'tafelnummer' => 1+$i,
                 'reserveernummer' => 12345678+$i,
                 'tijdin' => $faker->dateTime(),
                 'tijduit' => $faker->dateTime(),

            ]);









      }
    }
}
