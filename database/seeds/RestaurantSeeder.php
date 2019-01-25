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
//            DB::table('reserveringen')->insert([
//                'reserveernummer' => 12345678+$i,
//                'datum' => $faker->date(),
//                'tijd' => 25+$i,
//                'aantalgasten' => 6,
//                'klantnummer' => 1000+$i,
//            ]);
//             DB::table('users')->insert([
//                'password'=> bcrypt('password'),
//                'klantnummer' => 1000+$i,
//                'achternaam' => 'haoo',
//                'voorletter' => $faker->randomLetter(),
//                'voorvoegsel'=> $faker->randomLetter(),
//                'adres' => $faker->address(),
//                'postcode' => '7d',
//                'plaats' => $faker->city(),
//                 'status'=> '1', // 1 = klant , 2 = beheer / 0 = blok
//                 'email' => $faker->email(),
//            ]);
//
//
//
//            DB::table('bestellingen')->insert([
//                'device' => 1+$i,
//                'timestamp' => $faker->dateTime(),
//                'productnummer' => 2400+$i,
//                'prijsbetaald' => '0,00',
//                'aantalbesteld' => 2,
//                'reserveernummer' => 12345678+$i,
//
//            ]);
//
//             DB::table('tafelgegevens')->insert([
//                'tafelnummer' => 1+$i,
//                'aantalstoelen' => 2,
//                'status' => 1,
//            ]);
//             DB::table('tafelreserveringen')->insert([
//                 'tafelnummer' => 1+$i,
//                 'reserveernummer' => 12345678+$i,
//                 'tijdin' => $faker->dateTime(),
//                 'tijduit' => $faker->dateTime(),
//
//            ]);









      }
    }
}
