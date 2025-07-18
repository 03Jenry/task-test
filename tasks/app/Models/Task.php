<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'date_limit'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
