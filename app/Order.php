<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'bestellingen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['prijsbetaald, aantalbesteld, device, timestamp, productnummer'];

    public function orderpick(){
        return $this->hasMany('App\Reservation', 'reserveernummer', 'reserveernummer')->get();
    }

    public function product(){
        return $this->hasOne('App\Product', 'productnummer', 'productnummer')->get();
    }

    public function getReserveernummer(){
//        return $this->hasOne('App\Reservation', 'reserveer', 'klantnummer')->get();

    }

}

