<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany('App\Province');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Province');
    }
}
