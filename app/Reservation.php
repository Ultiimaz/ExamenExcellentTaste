<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reserveringen';
    protected $primaryKey = 'reserveernummer';
    public $timestamps = false;

    public function customer()
    {
//        return $this->hasOne('App\Models\Reservation');
        return $this->hasOne('App\Customers', 'klantnummer', 'klantnummer')->get();

    }

}
