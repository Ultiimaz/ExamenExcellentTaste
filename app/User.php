<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    protected $table = 'klantgegevens';
    protected $primaryKey = 'klantnummer';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['achternaam', 'tussenvoegsel', 'voornaam', 'voorletter', 'adres', 'postcode', 'plaats', 'email', 'name', 'email', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
