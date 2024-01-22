<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.sliders.index',compact('slider'));
    }

    public function create(){
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request){
        

    }
}
