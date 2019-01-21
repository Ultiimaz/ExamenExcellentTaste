<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExampleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //beheerder
        $faker = Faker::create();
        DB::table('users')->insert([
            'password'=> bcrypt('password'),
            'klantnummer' => 54321,
            'achternaam' => 'Milton',
            'voorletter' => 'J',
            'voorvoegsel'=> '',
            'adres' => $faker->address(),
            'postcode' => '7d',
            'plaats' => $faker->city(),
            'status'=> '2',
            'email' => 'beheerder@milton.nl',
        ]);
        //user
        $faker = Faker::create();

        $faker = Faker::create();
        DB::table('users')->insert([
            'password'=> bcrypt('password'),
            'klantnummer' => 12345,
            'achternaam' => 'Kramp',
            'voorletter' => 'J',
            'voorvoegsel'=> '',
            'adres' => $faker->address(),
            'postcode' => '7d',
            'plaats' => $faker->city(),
            'status'=> '1',
            'email' => 'klant@kramp.nl',
        ]);
    }
}
