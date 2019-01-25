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
            'email_verified_at'=> '2019-01-23 00:00:00',
        ]);
        //user

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
            'email_verified_at'=> '2019-01-23 00:00:00',

        ]);
        $faker = Faker::create();
        DB::table('users')->insert([
            'password'=> bcrypt('password'),
            'klantnummer' => 99657,
            'achternaam' => 'KOEKJE',
            'voorletter' => 'J',
            'voorvoegsel'=> '',
            'adres' => $faker->address(),
            'postcode' => '7d',
            'plaats' => $faker->city(),
            'status'=> '1',
            'email' => 'klant@koekje.nl',
            'email_verified_at'=> '2019-01-23 00:00:00',

        ]);
        $faker = Faker::create();
        DB::table('users')->insert([
            'password'=> bcrypt('password'),
            'klantnummer' => 66998,
            'achternaam' => 'Pasman',
            'voorletter' => 'J',
            'voorvoegsel'=> '',
            'adres' => $faker->address(),
            'postcode' => '7d',
            'plaats' => $faker->city(),
            'status'=> '1',
            'email' => 'klant@pasman.nl',
            'email_verified_at'=> '2019-01-23 00:00:00',
        ]);
          $faker = Faker::create();
        DB::table('users')->insert([
            'password'=> bcrypt('password'),
            'klantnummer' => 12578,
            'achternaam' => 'Heer',
            'voorletter' => 'J',
            'voorvoegsel'=> '',
            'adres' => $faker->address(),
            'postcode' => '7d',
            'plaats' => $faker->city(),
            'status'=> '1',
            'email' => 'klant@heer.nl',
            'email_verified_at'=> '2019-01-23 00:00:00',
        ]);

    }
}
