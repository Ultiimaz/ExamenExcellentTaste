<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestaurantTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserveringen', function (Blueprint $table) {
            $table->integer('reserveernummer'); //pk
            $table->date('datum', 20);
            $table->integer('tijd', 20);
            $table->string('aantalGasten', 50);
            $table->integer('klantnummer'); //fk

        });
        //klantgegevens
        Schema::create('users', function (Blueprint $table) {
            $table->integer('klantnummer');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('achternaam');
            $table->string('voorvoegsel')->nullable();
            $table->string('voorletter');
            $table->string('adres');
            $table->string('postcode');
            $table->string('plaats');
            $table->string('telefoon')->nullable();
            $table->integer('status')->default(1); // 2 is beheerder,1 is gebruiker en 0 is geblokkeerd!
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('producten', function (Blueprint $table) {
            $table->integer('productnummer');   //Pk
            $table->string('productomschrijving');
            $table->string('prijs');

        });
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->integer('device');          //pk,
            $table->timestamp('timestamp');     //pk,
            $table->integer('productnummer');   //pk, fk
            $table->string('prijsbetaald')->nullable();
            $table->integer('aantalbesteld');
            $table->integer('reserveernummer'); //FK


        });
        Schema::create('tafelgegevens', function (Blueprint $table) {
            $table->integer('tafelnummer');     //pk
            $table->integer('aantalstoelen');
            $table->integer('status');

        });

        Schema::create('tafelreserveringen', function (Blueprint $table) {
            $table->integer('reserveernummer'); //fk, pk
            $table->integer('tafelnummer');     //fk, pk
            $table->dateTime('tijdin');
            $table->dateTime('tijduit');

        });


        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserveringen');
        Schema::dropIfExists('users');
        Schema::dropIfExists('producten');
        Schema::dropIfExists('bestellingopnames');
        Schema::dropIfExists('bestellingen');
        Schema::dropIfExists('tafelgegevens');
        Schema::dropIfExists('tafelreserveringen');
        Schema::dropIfExists('password_resets');

    }
}
