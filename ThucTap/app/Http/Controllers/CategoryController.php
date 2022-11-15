<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug,$categoryId)
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        $products = Product::where('category_id',$categoryId)->paginate(6);
        return view('product.category.list',compact('categoryLimit','products','categories','sliders'));
    }
}
