<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name'   => 'required|string',
            'slug'   => 'required|string',
            'status' => 'nullable',
        ];
    }

    private function validateData()
    {
        return $this->validate();
    }

    public function resetInput()
    {
        $this->name     = null;
        $this->slug     = null;
        $this->status   = null;
        $this->brand_id = null;
    }

    public function closeModal()
    {
        $this->resetInput();
    }
    
    public function openModal()
    {
        $this->resetInput();
    }

    public function storeBrand()
    {
        $validatedData = $this->validateData();
        Brand::create([
            'name'   => $this->name,
            'slug'   => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        $this->setFlashMessage('Brand Created Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand          = Brand::find($brand_id);
        $this->name     = $brand->name;
        $this->slug     = $brand->slug;
        $this->status   = $brand->status == '1';
    }

    public function updateBrand()
    {
        $validatedData = $this->validateData();
        Brand::findOrFail($this->brand_id)->update([
            'name'   => $this->name,
            'slug'   => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        $this->setFlashMessage('Brand Updated Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        $this->setFlashMessage('Brand Deleted Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    private function setFlashMessage($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}

