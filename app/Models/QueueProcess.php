<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueProcess extends Model
{
    protected $fillable = [
        'id','queue', 'payload', 'attempts', 'reserved_at'
    ];
}
