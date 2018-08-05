<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'thumbnail',
        'detail',
        'category_id',
        'province_id',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot('content', 'parent_id');
    }

    public function reports()
    {
        return $this->belongsToMany('App\User', 'reports')->withPivot('type', 'content');
    }

    public function orders()
    {
        return $this->belongsToMany('App\User', 'orders')->withPivot('address', 'note');
    }

    public function images()
    {
        return $this->hasMany('images');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
