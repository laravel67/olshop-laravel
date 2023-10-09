<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name Product</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart['products'] as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp.{{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td> <button wire:click="removeFromCart({{ $product->id }})"
                                            class="btn btn-sm btn-danger">Remove</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <a href="{{ route('checkout') }}" class="btn btn-success float-right">Check Out</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
