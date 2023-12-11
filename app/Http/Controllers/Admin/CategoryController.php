<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller{

    public function index(){
        return view('admin.category.index');
    }
    
    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $this->handleImageUpload($request, $category);

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->has('status') ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    private function handleImageUpload($request, $category)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/category', $filename, 'public');
            $category->image = $filename;
        }
    }
}