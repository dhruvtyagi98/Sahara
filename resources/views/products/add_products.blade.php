@extends('layouts.app')
@section('title', 'Sahara | Add Products')
@section('main-content')
    <style>
        body{
            background-image: url('../images/background_image2.jpg');
        }
        .navbar{
            background-color': #F3FFB0!important;
        }
    </style>

    <div class="row">
        <h2 id="add_product_heading">Add Product</h2>
    </div>
    <div class="row" id="add_product_div">
        <div class="card shadow" style="padding-inline: 2%;">
            <form action="/product/add_product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body" style="margin-top: 2%;">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="product_name">Product Name</label>
                                <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name" required>
                                @error('product_name')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <label class="form-label" for="product_category">Category</label>
                                        <select class="form-select" name="product_category" aria-label="Default select example" required>
                                            <option value="sneaker">Sneakers</option>
                                            <option value="shirt">Shirt</option>
                                            <option value="tshirt">T-shirt</option>
                                            <option value="trouser">Trousers</option>
                                            <option value="jean">Jeans</option>
                                            <option value="jacket">Jackets</option>
                                            <option value="watch">Watches</option>
                                        </select>
                                        @error('product_category')
                                            <div class="error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="gender">Gender</label>
                                        <select name="gender" class="form-select" aria-label="Default select example" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="female">Unisex</option>
                                        </select>
                                        @error('gender')
                                            <div class="error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product_description">Description</label>
                                <textarea name="product_description" class="form-control" rows="6" required></textarea>
                                @error('product_description')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <img id="default_product_img" src="{{ asset('images/default_product.png') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="product_img" class="form-label">Product Image</label>
                                            <input class="form-control" type="file" id="product_img" name="product_img">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="size">Product Size</label>
                                                    <input type="text" class="form-control" name="product_size" placeholder="Enter Product Size" required>
                                                    @error('product_size')
                                                        <div class="error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="quantity">Product Quantity</label>
                                                    <input type="text" class="form-control" name="product_quantity" placeholder="Enter Product Quantity" required>
                                                    @error('product_quantity')
                                                        <div class="error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="location">Price</label>
                                            <input type="number" class="form-control" name="product_price" placeholder="Enter Product Price" required>
                                            @error('product_price')
                                                <div class="error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="location">Location</label>
                                            <input type="text" class="form-control" name="product_location" placeholder="Enter Product Location" required>
                                            @error('product_location')
                                                <div class="error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-1 d-flex justify-content-end">
                                            <button class="btn btn-primary mt-4" type="submit">Add Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    product_img.onchange = evt => {
        const [file] = product_img.files
        if (file) {
            default_product_img.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
