@extends('layouts.app')
@section('title', 'Sahara | Details')
@section('main-content')
<div id="product_details">
    <div class="card shadow">
        <img class="shadow" src="{{ asset('images/'.$product->picture) }}">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col">
                    <h4 class="card-title">{{ $product->name }}</h4>
                </div>
                @if (Auth::user())
                    <form action="/user/add_to_cart" method="POST">
                        @csrf
                        <div class="col d-flex justify-content-end">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="item_id" value="{{ $product->id }}">
                            <button class="btn btn-primary" type="submit" style="margin-right: 50px">Add to cart</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="row mb-5">
                <h5 class="mb-3">Description</h5>
                <p>{{ $product->description }}</p>
            </div>
            <div class="row mb-5">
                <h5 class="mb-3">Specification</h5>
                <div class="row">
                    <div class="row mb-3">
                        <div class="col-4">Price</div>
                        <div class="col">{{ $product->price }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">Category</div>
                        <div class="col">{{ $product->category }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">Gender</div>
                        <div class="col">{{ $product->gender }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">size</div>
                        <div class="col">{{ $product->size }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">Quantity Available</div>
                        <div class="col">{{ $product->quantity }}</div>
                    </div>
                </div>
                {{-- <table class="table table-borderless" style="margin-inline: 7%">
                    <tr>
                        <td>Price</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $product->category }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $product->gender }}</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>{{ $product->size }}</td>
                    </tr>
                    <tr>
                        <td>Quantity Available</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                </table> --}}
            </div>
        </div>
    </div>
</div>
@endsection