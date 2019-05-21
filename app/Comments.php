<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nick',
        'avatar',
        'text',
        'film_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
