<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //
    protected $fillable = [
        'content', 'from_id', 'privacy','likes','img_src'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
