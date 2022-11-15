<?php

namespace App\Http\View;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    protected $users;
    public function __construct()
    {
    }
    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'feature_image_path', 'content')
            ->whereIn('id', $productId)
            ->get();
        $view->with('carts', $products);

    }
}
