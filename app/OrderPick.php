<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPick extends Model
{
    protected $table = 'bestellingopnames';
    protected $primaryKey = ['device', 'timestamp'];
    public $incrementing = false;


    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'reserveernummer', 'reserveernummer')->get();
    }
}
