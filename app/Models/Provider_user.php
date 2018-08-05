<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider_user extends Model
{
    protected $fillable = [
        'user_id',
        'provider_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
