<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestCount extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'count',
    ];
}
