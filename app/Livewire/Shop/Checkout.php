<?php

namespace App\Livewire\Shop;

use Midtrans\Snap;
use Midtrans\Config;
use Livewire\Component;
use App\Livewire\Shop\Cart;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $postal_code;
    public $formCheckOut;
    public $snapToken;

    protected $listeners = [
        'emptyCart' => 'emptyCartHandler'
    ];

    public function mount()
    {
        $this->formCheckOut = true;
    }

    public function render()
    {
        return view('livewire.shop.checkout');
    }

    public function checkout()
    {
        $this->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'postal_code'   => 'required'
        ]);

        $cart = Cart::get()['products'];

        $amount = array_sum(
            array_column($cart, 'price')
        );

        $costumerDetail = [
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'city'          => $this->city,
            'postal_code'   => $this->postal_code
        ];

        $transactionDetail = [
            'order_id' => uniqid(),
            'gross_amount' => $amount
        ];

        $payload = [
            'transaction_detail' => $transactionDetail,
            'costumer_detail' => $costumerDetail
        ];

        $this->formCheckOut = false;
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $snapToken = Snap::getSnapToken($payload);
        $this->snapToken = $snapToken;
    }
    public function emptyCartHandler()
    {
        Cart::clear();
        $this->dispatch('cartClear');
    }
}
