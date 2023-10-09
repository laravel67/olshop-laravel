<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $image;

    public function render()
    {
        return view('livewire.products.create');
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|max:1024'
        ]);

        $nameImage = '';

        if ($this->image) {
            $nameImage = Str::slug($this->name, '-')
                . '-'
                . uniqid()
                . '-'
                . $this->image->getClientOriginalExtension();

            $this->image->storeAs('public', $nameImage, 'local');

            // $this->image = $nameImage;
        }
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $nameImage
        ]);
        // $this->name = NULL;
        // $this->description = NULL;
        // $this->price = NULL;
        $this->dispatch('productStore');
    }
}
