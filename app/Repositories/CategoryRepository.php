<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Category::class;
    }

    public function arrayCategories()
    {
        $this->makeModel();
        
        return $this->model->where('parent_id', '=', null)
                ->pluck('name', 'id')
                ->toArray();
    }

    public function findBySlug($slug)
    {
        $this->newQuery()
            ->loadWhere();
        $category = $this->where('slug', $slug)->first();
        if ($category) {
            return $category;
        }

        return false;
    }

    public function analyticsCategory()
    {
        $this->makeModel();
        $data = [
            'categories' => [],
            'numbers' => [],
        ];
        $counts = DB::table('categories')
            ->join(DB::raw(
                        '(select `category_id`, count(*) as number
                            from `products`
                            group by `category_id`) as productsCount'
                        ), function ($join) {
                            $join->on('categories.id', 'productsCount.category_id');
                        })
            ->select('name', 'productsCount.number')->get();

        foreach ($counts as $value) {
            $data['categories'][] = $value->name;
            $data['numbers'][] = $value->number;
        }

        return $data;
    }
}
