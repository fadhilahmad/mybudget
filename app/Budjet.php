<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budjet extends Model
{
    protected $fillable = ['item','price','tag','date'];
}
