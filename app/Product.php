<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'producten';
    protected $primaryKey = 'productnummer';
    public $timestamps = false;
}
