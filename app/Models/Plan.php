<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $casts = [
        'rules' => 'array',
    ];

    protected $fillable = [
        'title',
        'value',
        'rules',
        'description',
        'stripe',
    ];
}
