<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['check', 'title', 'description', 'user_id'];

    protected $casts = [
        'check' => 'boolean'
    ];
}
