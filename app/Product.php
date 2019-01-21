<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'producten';
    protected $primaryKey = 'productnummer';
    protected $fillable = ['productomschrijving', 'prijs'];
    public $timestamps = false;
}
