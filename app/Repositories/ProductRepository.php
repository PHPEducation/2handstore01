<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Product::class;
    }

    public function suggestedProducts($id)
    {
        $this->newQuery()
            ->loadWhere();
            
        return $this->model->where('category_id', '=', $id)
            ->where('status', '=', '1')
            ->withProvince()
            ->limit(config('database.suggested'))->get();
    }

    public function searchProduct($request)
    {
        $this->newQuery()
            ->loadWhere();
        $path = '?search=' . $request->search
            . '&category=' . $request->category
            . '&city=' . $request->city
            . '&province=' . ($request->has('city') ? $request->province : '')
            . '&minprice=' . $request->minprice
            . '&maxprice=' . $request->maxprice
            . '&sort=' . $request->sort
            . '&orderBy=' . $request->orderBy
            . '&type=' . $request->type;

        return $this->model->where(function ($sub) use ($request) {
            if ($request->search) {
                $sub->search($request->search);
            }
            if ($request->category) {
                $sub->where('category_id', '=', $request->category);
            }
            if ($request->city) {
                $sub->whereIn('province_id', function ($query) use ($request) {
                    $query->select('id')
                        ->from('provinces')
                        ->where('city_id', $request->city);
                });
            }
            if ($request->province) {
                $sub->where('province_id', '=', $request->province);
            }
            if ($request->minprice) {
                $sub->where('price', '>=', $request->minprice);
            }
            if ($request->maxprice) {
                $sub->where('price', '<=', $request->maxprice);
            }
        })->withProvince()
            ->orderBy($request->orderBy ?: 'price', $request->type?: 'asc')
            ->paginate(config('database.paginate'))->withPath($path);
    }

    public function listProduct()
    {
        $this->newQuery()
            ->loadWhere();
        $args = func_get_args();
        if (func_num_args() > 0 && strlen($args[0]) >= 2) {
            return $this->model->search($args[0])
                    ->with('category', 'user')
                    ->withProvince()
                    ->latest()
                    ->paginate(config('database.paginate'));
        }

        return $this->model->with('category', 'user')
                ->withProvince()
                ->latest()
                ->paginate(config('database.paginate'));
    }
    
    public function analytics($year)
    {
        $analytics = [];
        for ($i = 1; $i <= 12; $i++) {
            $analytics[$i] = 0;
        }

        $products = DB::table('products')
            ->select(DB::raw('MONTH(created_at) as month, count(*) as product'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('month'))
            ->orderBy(DB::raw('month'))->get();
        foreach ($products as $value) {
            $analytics[$value->month] = $value->product;
        }

        return $analytics = array_values($analytics);
    }
}
