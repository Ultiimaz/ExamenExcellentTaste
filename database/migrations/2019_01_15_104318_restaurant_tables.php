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
            $table->string('datum', 20);
            $table->string('aantalGasten', 50);
            $table->integer('klantnummer'); //fk

        });
        //klantgegevens
        Schema::create('users', function (Blueprint $table) {
            $table->increments('klantnummer');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('voornaam',50);
            $table->string('tussenvoegsel', 10)->nullable();
            $table->string('achternaam', 20);
            $table->string('voorletter', 10);
            $table->string('adres', 100);
            $table->string('postcode', 4);
            $table->string('plaats', 100);
        });


        Schema::create('producten', function (Blueprint $table) {
            $table->integer('productnummer');   //Pk
            $table->string('productomschrijving');
            $table->string('prijs');

        });
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->integer('device');          //pk,
            $table->integer('timestamp');     //pk,
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
            $table->integer('tijdin');
            $table->integer('tijduit');

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