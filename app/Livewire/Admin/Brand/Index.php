<?php

namespace App\Livewire\Admin\Brand;

// use Livewire\Attributes\Layout;
use Livewire\Component;
// use App\Models\Brand;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.brand.index')
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
