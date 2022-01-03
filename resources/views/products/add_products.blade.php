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
            <form action="" enctype="multipart/form-data">
                <div class="card-body" style="margin-top: 2%;">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="product_name">Product Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Enter Product Name" required>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <label class="form-label" for="product_category">Category</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="sneaker">Sneakers</option>
                                            <option value="shirt">Shirt</option>
                                            <option value="tshirt">T-shirt</option>
                                            <option value="trouser">Trousers</option>
                                            <option value="jean">Jeans</option>
                                            <option value="jacket">Jackets</option>
                                            <option value="watche">Watches</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="gender">Gender</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="" id="" class="form-control" rows="6"></textarea>
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
                                            <input class="form-control" type="file" id="product_img" name="image">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="size">Product Size</label>
                                                    <input type="text" class="form-control" name="size" placeholder="Enter Product Size">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="quantity">Product Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" placeholder="Enter Product Quantity">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label class="form-label" for="location">Location</label>
                                            <input type="text" class="form-control" name="location" placeholder="Enter Product Location">
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <button class="btn btn-primary mt-5" type="submit">Add Product</button>
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
