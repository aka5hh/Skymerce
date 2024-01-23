<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('frontend.index',compact('sliders'));;
    }

    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.collections.categories.index',compact('categories'));;
    }

    public function products($category_slug)
    {
        $brands = Brand::where('status', 1)->get();
        $category = Category::where('slug', $category_slug)->first();
        if($category){
        $products = $category->products()->get();
        return view('frontend.collections.products.index',compact('products','category','brands'));;
        }else{
            return redirect()->back();
        }
    }
}
