<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'bestellignen';
    protected $primaryKey = ['device', 'timestamp', 'productnummer'];
    public $incrementing = false;

}
