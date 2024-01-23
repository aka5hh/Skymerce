<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
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
}
