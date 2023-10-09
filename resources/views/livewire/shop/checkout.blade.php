<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check Out</div>
                <div class="card-body">
                    @if ($formCheckOut)
                        <form wire:submit.prevent="checkout" method="POST">
                            <div class="form-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <input wire:model="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            type="text" placeholder="First Name">
                                        @error('first_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror" type="text"
                                            placeholder="Last Name">
                                        @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <input wire:model="email"
                                            class="form-control @error('email') is-invalid @enderror" type="email"
                                            placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="phone"
                                            class="form-control @error('phone') is-invalid @enderror" type="number"
                                            placeholder="Phone">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address"></textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <input wire:model="city"
                                            class="form-control @error('city') is-invalid @enderror" type="text"
                                            placeholder="City">
                                        @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="postal_code"
                                            class="form-control @error('postal_code') is-invalid @enderror"
                                            type="text" placeholder="Postal Code">
                                        @error('postal_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">Ceck out</button>
                            </div>
                        </form>
                    @else
                        <button wire:click="$dispatch('payment', '{{ $snapToken }}')"
                            class="btn btn-success">Payment</button>
                        <script>
                            window.livewire.on('payment', function(snapToken) {
                                snap.pay(snapToken, {
                                    onSuccess: function(result) {
                                        window.livewire.dispatch('emptyCart'); // Corrected typo here
                                        window.location.href = '/shop';
                                    },
                                    onPending: function(result) {
                                        location.reload();
                                    },
                                    onError: function(result) {
                                        location.reload();
                                    }
                                });

                                // window.livewire.emit('emptyCart');
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
