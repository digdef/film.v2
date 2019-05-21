<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    protected $table = 'subscribes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'subscriber',
        'subscription'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
