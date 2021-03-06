<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'bestellingen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;
    protected $fillable = ['prijsbetaald, aantalbesteld, device, timestamp'];

    public function orderpick()
    {
        return $this->hasMany('App\Reservation', 'reserveernummer', 'reserveernummer')->get();
    }

    public function product(){
        return $this->hasOne('App\Product', 'productnummer', 'productnummer')->get();
    }
}

