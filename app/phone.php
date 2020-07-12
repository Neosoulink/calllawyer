<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $fillable =  [
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
