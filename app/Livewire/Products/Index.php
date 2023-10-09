<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $formVisible;
    public $formUpdate = false;

    public $updateQueryString = [
        ['search' => ['except' => '']],
    ];

    protected $listeners = [
        'formClose' => 'formCloseHandler',
        'productStore' => 'productStoreHandler'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->search === null ?
                Product::latest()->paginate($this->paginate) :
                Product::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function formCloseHandler()
    {
        $this->formVisible = false;
    }
    public function productStoreHandler()
    {
        $this->formVisible = false;
        session()->flash('success', 'New Product Has been Added !');
    }

    public function editProduct($productId)
    {
        $this->formUpdate = true;
        $this->formVisible = true;
        $product = Product::find($productId);
        $this->dispatch('editProduct', $product);
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        session()->flash('success', 'Product Has been Deleted !');
    }
}
