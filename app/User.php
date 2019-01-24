<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CanResetPassword;

    protected $table = 'users';
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



