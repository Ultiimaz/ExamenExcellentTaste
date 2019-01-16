<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'bestellingen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;


    public function orderpick()
    {
        return $this->hasMany('App\Reservering', 'reserveernummer', 'reserveernummer')->get();
    }

    public function product(){
        return $this->hasOne('App\Producten', 'productnummer', 'productnummer')->get();

    }
}

