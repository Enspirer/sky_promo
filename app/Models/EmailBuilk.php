<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailBuilk extends Model
{
    protected $fillable = [
        'email', 'description', 'category'
    ];
}
