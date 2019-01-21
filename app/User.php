<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'klantnummer';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['achternaam', 'voorvoegsel','voorletter', 'adres', 'postcode', 'plaats', 'email','telefoonnummer'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isBeheerder(){
        if ($this->status == 2){
            return true;
        }
        else{
            return false;
        }



    }
}



