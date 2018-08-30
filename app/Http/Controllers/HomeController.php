<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Product;
use App\Category;
use Pusher\Pusher;
use App\Events\OrderEvent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    private $category;
    private $product;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    ) {
        $this->category = $categoryRepository;
        $this->product = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::latest()->get();
        $categories = Category::get();
        $new_products = Product::latest()->available()->withProvince()->paginate(config('database.homepaginate'));

        return view('client.homepage', compact('categories', 'new_products', 'slides'));
    }

    public function adminIndex()
    {
        return view('admin.dashboard');
    }

    public function getChart()
    {
        $product_analytic = $this->product->analytics(Carbon::now()->year);
        $category_analytic = $this->category->analyticsCategory();

        return response()->json([
            'line' => $product_analytic,
            'pie' => $category_analytic
        ]);
    }

    public function loadMoreProduct(Request $request)
    {
        $products = Product::latest()->paginate(config('database.homepaginate'));
        if ($request->page > $products->lastPage()) {
            return response()->json([
                'lastpage' => true
            ]);
        }

        return view('client.product.loadmore', compact('products'));
    }
}
