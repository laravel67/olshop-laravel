<?php

namespace App\Livewire\Shop;

use App\Facades\Cart;
use view;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    protected $updateQueryString = [
        ['search' => ['except' => '']]
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.shop.index', [
            'products' => $this->search === null ?
                Product::latest()->paginate(8) :
                Product::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(8)
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        Cart::add($product);
        // $cart = Cart::add($product);
        // dd($cart['products']);
        $this->dispatch('addToCart');
        // dd(Cart::get()['products']);
    }
}
