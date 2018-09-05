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

    public function scopeReports($query, $search = null)
    {
        return $query->join('products', 'reports.product_id', 'products.id')
                ->join('users', 'reports.user_id', 'users.id')
                ->select('reports.*', 'users.email as email', 'products.name as name')
                ->where('products.name', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(config('database.paginate'));
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

    public function scopeUnseenReport($query)
    {
        return Report::count();
    }
}
