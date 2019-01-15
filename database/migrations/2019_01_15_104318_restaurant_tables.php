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
            $table->string('achternaam', 100);
            $table->string('aantalGasten', 50);
            $table->integer('klantnummer'); //fk

        });

        Schema::create('klantgegevens', function (Blueprint $table) {
            $table->integer('klantnummer')->primary(); //pk
            $table->string('voornaam',50);
            $table->string('tussenvoegsel', 10);
            $table->string('achternaam', 20);
            $table->string('voorletter', 10);
            $table->string('adres', 100);
            $table->string('postcode', 4);
            $table->string('plaats', 100);
            $table->string('email', 255);
        });

        Schema::create('bestellingopnames', function (Blueprint $table) {
            $table->integer('device');          //pk, fk
            $table->timestamp('timestamp');     //pk, fk
            $table->integer('reserveernummer');

        });

        Schema::create('producten', function (Blueprint $table) {
            $table->integer('productnummer');   //Pk
            $table->string('productomschrijving');
            $table->string('prijs');

        });
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->integer('device');          //pk, fk
            $table->timestamp('timestamp');     //pk, fk
            $table->integer('productnummer');   //pk, fk
            $table->integer('prijsbetaald');
            $table->integer('aantalbesteld');

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



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserveringen');
        Schema::dropIfExists('klantgegevens');
        Schema::dropIfExists('producten');
        Schema::dropIfExists('bestellingopnames');
        Schema::dropIfExists('bestellingen');
        Schema::dropIfExists('tafelgegevens');
        Schema::dropIfExists('tafelreserveringen');

    }
}
