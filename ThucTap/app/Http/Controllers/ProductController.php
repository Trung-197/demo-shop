<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = $this->product->find($id);
        $productsRecommend = Product::take(12)->get();
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        return view('product.details.index',compact('categories','product','productsRecommend','categoryLimit'));
    }
}
