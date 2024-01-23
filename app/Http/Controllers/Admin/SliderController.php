<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.sliders.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? 1 : 0;

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    public function edit(Slider $slider)
    {
        $slider = Slider::findOrFail($slider->id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(int $slider_id, SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        $slider = Slider::findOrFail($slider_id);
        if ($slider) {
            $slider->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $request->status == true ? 1 : 0,
            ]);
            return redirect('admin/sliders')->with('message', 'Slider Updated Successfully');
        } else {
            return redirect('admin/sliders')->with('message', 'Slider Update Failed');
        }
    }

    public function destroy(int $slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        if (File::exists($slider->image)) {
            File::delete($slider->image);
        }
        $slider->delete();
        return redirect('admin/sliders')->with('message', 'Slider deleted successfully');
    }

}
