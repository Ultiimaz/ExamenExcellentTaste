<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'klantgegevens';
    protected $primaryKey = 'klantnummer';
    public $timestamps = false;
}
