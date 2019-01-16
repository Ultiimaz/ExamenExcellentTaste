<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reserveringen';
    protected $primaryKey = 'reserveernummer';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['aantal_gasten, tijd, datum'];

    public function customer()
    {
        return $this->hasOne('App\User', 'klantnummer', 'klantnummer')->get();

    }

}
