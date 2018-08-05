<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'parent_id',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }
}
