<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = 'leases';
    protected $fillable = [
        'book_id', 'user_id', 'price'
    ];
}
