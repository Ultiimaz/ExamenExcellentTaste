<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableData extends Model
{
    protected $table = 'tafelgegevens';
    protected $primaryKey = 'tafelnummer';
    protected $fillable = ['tafelnummer', 'aantalstoelen', 'status'];
    public $timestamps = false;
    public $incrementing = false;

}
