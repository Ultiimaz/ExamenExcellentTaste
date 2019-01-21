<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    protected $table = 'tafelreserveringen';
    protected $primaryKey = ['reserveernummer', 'tafelnummer'];
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['tijd_in', 'tijd_uit'];

    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'reserveernummer', 'reserveernummer')->get();
    }

    public function table(){
        return $this->hasOne('App\TableData', 'tafelnummer', 'tafelnummer')->get();

    }

}
