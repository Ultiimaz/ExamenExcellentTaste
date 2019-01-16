<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableData extends Model
{
    protected $table = 'tafelgegevens';
    protected $primaryKey = 'tafelnummer';
    public $incrementing = false;

}
