<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'producten';
    protected $primaryKey = 'productnummer';
    protected $fillable = ['productomschrijving', 'prijs'];
    public $timestamps = false;

    public function category(){
        return $this->hasOne('App\ProductCategory', 'category_id', 'category_id')->get();

    }
}
