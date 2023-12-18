<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategort($category_id){
        $this->category_id = $category_id;
    }

    public function destoryCategory(){
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Category has been deleted successfully');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        $categories= Category::orderby('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
