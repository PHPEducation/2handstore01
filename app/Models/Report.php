<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'type', 'content', 'product_id', 'user_id'
    ];

    public function scopeReports($query)
    {
        return $query->orderBy('updated_at', 'desc')->paginate(config('database.paginate'));
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function SaveReport($request, $id)
    {
        $report = new Report();
        $report->user_id = Auth::user()->id;
        $report->product_id = $id;
        $report->fill($request->all());
        $report->save();
    }
}
