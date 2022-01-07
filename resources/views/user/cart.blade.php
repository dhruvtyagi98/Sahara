@extends('layouts.app')
@section('title', 'Sahara | Cart')
@section('main-content')
<div id="user_listed_items">
    <div class="row">
        <h2 id="add_product_heading"><ion-icon name="cart-outline"></ion-icon>&nbsp;Cart</h2>
    </div>
    <div class="row">
        <div class="col-4 position-fixed">
            <div id="search_filter">
                <div class="card shadow">
                    <div class="card-body" style="margin: 3%;">
                        <div class="row">
                            <h5>Checkout</h5>
                        </div>
                        <div class="row">
                            <p>Item Total : Rs {{ $price['item'] }}</p>
                        </div>
                        <div class="row">
                            <p>Tax : Rs {{ $price['tax'] }}</p>
                        </div>
                        <div class="row mb-3" style="border-bottom: 1px solid;"></div>
                        <div class="row">
                            <p>Total Price : Rs {{ $price['total'] }}</p>
                        </div>
                        <form action="/user/order" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="price" value="{{ $price['total'] }}">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
        </div>
        <div class="col" id="user_all_items">
            @if (isset($products))
                @foreach ($products as $product)
                    <div class="card shadow" style="margin-left: 0; margin-top: 3%;">
                        <a href="/product/{{ $product->id }}" style="text-decoration: none;color:black">
                            <div class="card-body" id="search_card_body">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset('images/'.$product->picture) }}">
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4>{{ $product->name }}</h4>
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <form action="/user/cart" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $product->cart_id }}">
                                                    <button type="submit" class="btn text-danger "><h4 style="margin-bottom: 0;"><ion-icon name="trash-outline"></ion-icon></h4></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-2">
                                                <div class="col-2">Price</div>
                                                <div class="col">{{ $product->price }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Category</div>
                                                <div class="col">{{ $product->category }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Gender</div>
                                                <div class="col">{{ $product->gender }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">size</div>
                                                <div class="col">{{ $product->size }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            @if ($products->count() == 0)
                <div class="card shadow" style="margin-left: 0; margin-top: 3%; height: 400px;">
                    <div class="card-body" id="search_card_body" style="margin: 0;">
                        <div class="row">
                            <img src="{{ asset('images/no-product-found.png') }}" style="height: 400px;border-radius: 10px;">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection