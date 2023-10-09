@extends('components.layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Add New Product</div>
                    <div class="card-body">
                        @livewire('products.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
