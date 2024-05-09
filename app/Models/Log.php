<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'id', 'day', 'month', 'year','value', 'thrift', 'user_id', 
    ];
}

