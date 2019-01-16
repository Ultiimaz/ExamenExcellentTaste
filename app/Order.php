<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'bestellignen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;


    public function orderpickdevice()
    {
        return $this->hasOne('App\OrderPick', 'device', 'device')->get();
    }
    public function orderpicktimestamp(){
        return $this->hasOne('App\OrderPick', 'timestamp', 'timestamp')->get();
    }
    public function product(){
        return $this->hasOne('App\Producten', 'productnummer', 'productnummer')->get();

    }

}
