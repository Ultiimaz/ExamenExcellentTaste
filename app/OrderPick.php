<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPick extends Model
{
    protected $table = 'bestelopnames';
    protected $primaryKey = ['device', 'timestamp'];
    public $incrementing = false;


    public function reservation()
    {
        return $this->belongsToMany('App\Reservation', 'reserveernummer', 'reserveernummer')->get();
    }
}
