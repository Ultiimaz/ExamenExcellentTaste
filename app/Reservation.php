<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reserveringen';
    protected $primaryKey = ['reserveernummer','tafelnummer'];
    public $timestamps = false;
    protected $fillable = ['aantal_gasten', 'tijd', 'datum'];

    public function customer()
    {
        return $this->hasOne('App\User', 'klantnummer', 'klantnummer')->get();

    }
    public function reservedTables()
    {
        return $this->hasMany(TableReservation::class,'reserveernummer', 'reserveernummer');
    }
}
