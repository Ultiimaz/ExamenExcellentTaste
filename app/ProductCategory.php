<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    public $incrementing = true;

    public function products() {
        return $this->hasMany('App\Product', 'category_id', 'category_id')->get();
    }
}
