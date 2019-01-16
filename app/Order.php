<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'bestellingen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;
    public $timestamps = false;

}
