@extends('layouts.app')
@section('title', 'Sahara | Orders')
@section('main-content')
<div id="order_page">
    <div class="row">
        <h2 id="add_product_heading"><ion-icon name="clipboard-outline"></ion-icon>&nbsp;Orders</h2>
    </div>
    <div class="row">
        @for ($i = 0; $i < count($products); $i++)
            <div class="card shadow">
                <div class="row" style="margin-left: 3%; margin-top:1%; color: rgb(163, 163, 163);">
                    Ordered on, {{  date('F d, Y', strtotime($orders[$i]['created_at'])) }}
                </div>
                <div class="card-body">
                    @php $j = 1 @endphp
                    <div class="row">
                        <div class="col-5">
                            @foreach ($products[$i] as $product)
                                <div class="row mb-4">
                                    <div class="col-1">{{ $j++ }}</div>
                                    <div class="col-3">
                                        {{ $product->name }}
                                    </div>
                                    <div class="col-3">
                                        Rs {{ $product->price }}
                                    </div>
                                    <div class="col-2">
                                        {{ $product->gender }}
                                    </div>
                                    <div class="col-3">
                                        Size :{{ $product->size }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col">
                            Delivary Address : {{ $orders[$i]['address'] }}
                        </div>
                        <div class="col">
                            Total Price : {{ $orders[$i]['price'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection