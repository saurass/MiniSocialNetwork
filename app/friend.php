<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    //
    protected $fillable = [
        'from_id', 'to_id','status',
    ];

    protected $hidden = [

    ];
}
