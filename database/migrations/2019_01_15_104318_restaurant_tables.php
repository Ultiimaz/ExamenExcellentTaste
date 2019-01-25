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

            $table->bigInteger('reserveernummer'); //pk
            $table->integer('tijd');
            $table->date('datum', 20);
            $table->string('aantalGasten', 50);
            $table->integer('klantnummer'); //fk
            $table->string('dieetwensen')->nullable();
        });

        //klantgegevens
        Schema::create('users', function (Blueprint $table) {
            $table->integer('klantnummer')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('achternaam')->nullable();
            $table->string('voorvoegsel')->nullable();
            $table->string('voorletter')->nullable();
            $table->string('adres')->nullable();
            $table->string('postcode')->nullable();
            $table->string('plaats')->nullable();
            $table->string('telefoon')->nullable();
            $table->integer('status')->default(1); // 2 is beheerder,1 is gebruiker en 0 is geblokkeerd, 3 is verwijderd!
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('producten', function (Blueprint $table) {
            $table->increments('productnummer');   //Pk
            $table->string('productomschrijving');
            $table->decimal('prijs');
            $table->string('category_id');
        });

        Schema::create('product_categories', function(Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name');
        });

        Schema::create('bestellingen', function (Blueprint $table) {
            $table->integer('device');          //pk,
            $table->timestamp('timestamp');     //pk,
            $table->integer('productnummer');   //pk, fk
            $table->string('prijsbetaald')->nullable();
            $table->integer('aantalbesteld');
            $table->bigInteger('reserveernummer'); //FK
        });

        Schema::create('tafelgegevens', function (Blueprint $table) {
            $table->increments('tafelnummer');     //pk
            $table->integer('aantalstoelen');
            $table->boolean('status');

        });

        Schema::create('tafelreserveringen', function (Blueprint $table) {
            $table->bigInteger('reserveernummer'); //fk, pk
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
        Schema::dropIfExists('product_categories');

    }
}
