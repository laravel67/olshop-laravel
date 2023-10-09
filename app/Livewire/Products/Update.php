<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $productId, $name, $description, $price, $image, $imageOld;

    protected $listners = [
        'editProduct' => 'editProductHandler'
    ];

    public function render()
    {
        return view('livewire.products.update');
    }

    public function editProductHandler($product)
    {
        $this->productId = $product['id'];
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->imageOld = asset('storage/' . $product['image']);
    }
}
