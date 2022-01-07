@extends('layouts.app')
@section('title', 'Sahara | Search Results')
@section('main-content')
<div id="user_listed_items">
    <div class="row">
        @if (isset($products))
            <h2 id="add_product_heading" style="text-align: center">{{ $products->total() }} Results Found!</h2>
        @else
            <h2 id="add_product_heading" style="text-align: center">0 Results Found!</h2>
        @endif
    </div>
    <div class="row">
        <div class="col-4 position-fixed">
            <div id="search_filter">
                <div class="card shadow">
                    <div class="card-body" style="margin: 3%;">
                        <form action="search" method="GET">
                            @csrf
                            <div class="row">
                                <h5>Sort</h5>
                                <input type="hidden" name="search" value="{{ app('request')->input('search') }}">
                                <div class="row mb-3">
                                    <select class="form-select mb-3" onchange="this.form.submit()" name="sort_price" aria-label="Default select example">
                                        <option value="">Select</option>
                                        <option value="ASC">Price Low to High</option>
                                        <option value="DESC">Price High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <form action="search-filter" method="POST">
                            @csrf
                            <div class="row">
                                <h5>Filters</h5>
                                <input type="hidden" name="search" value="{{ app('request')->input('search') }}">
                                {{-- <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="filter_price">Min Price :</label>
                                    </div>
                                    <div class="col">
                                        <p id="min_price_filter_value"></p>   
                                    </div>
                                    <input type="range" class="form-range" value="0" min="0" max="100000" step="100" id="filter_price_min" name="min_price">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="filter_price">Max Price :</label>
                                    </div>
                                    <div class="col">
                                        <p id="max_price_filter_value"></p>   
                                    </div>
                                    <input type="range" class="form-range" value="0" min="0" max="100000" step="100" id="filter_price_max" name="max_price">
                                </div> --}}
                                <div class="row mb-3">
                                    <label class="form-label" for="product_category">Category</label>
                                    <select class="form-select" name="product_category" aria-label="Default select example">
                                        <option value="">Select</option>
                                        <option value="sneaker">Sneakers</option>
                                        <option value="shirt">Shirt</option>
                                        <option value="tshirt">T-shirt</option>
                                        <option value="trouser">Trousers</option>
                                        <option value="jean">Jeans</option>
                                        <option value="jacket">Jackets</option>
                                        <option value="watch">Watches</option>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select name="gender" class="form-select" aria-label="Default select example">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="female">Unisex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Search</button>
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
                        <a href="product/product_details/{{ $product->id }}" style="text-decoration: none;color:black">
                            <div class="card-body" id="search_card_body">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset('images/'.$product->picture) }}">
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <h4>{{ $product->name }}</h4>
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
            @if ($products->total() == 0)
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
    @if (isset($products))
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        updatePriceFilter(0,'min_price_filter_value');
        updatePriceFilter(0,'max_price_filter_value');
        $('#filter_price_max').on('input', function () {
            updatePriceFilter(this.value,'max_price_filter_value');
        });
        $('#filter_price_min').on('input', function () {
            updatePriceFilter(this.value,'min_price_filter_value');
        });
    });

    function updatePriceFilter(value,element) {
        $('#'+element).text(value);
    }
</script>
@endsection