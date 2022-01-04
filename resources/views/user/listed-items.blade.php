@extends('layouts.app')
@section('title', 'Sahara | My Items')
@section('main-content')
<div id="user_listed_items">
    <div class="row">
        <h2 id="add_product_heading">User Listed Products</h2>
    </div>
    <div class="row">
        <div class="col-4 position-fixed">
            <div id="product_view"></div>
        </div>
        <div class="col-4">
        </div>
        <div class="col" id="user_all_items">
            <div class="card" style="margin-left: 0; margin-top: 3%;">
                <div class="card-body">
                    <table class="table-borderless" id="user_products_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a class="btn product_id" id="{{ $product->id }}">
                                            <h5><ion-icon name="eye-outline"></ion-icon></h5>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $('#user_products_table').DataTable();

    getProduct('{{ $products[0]->id }}');

    $('.product_id').on('click', function () {
        getProduct(this.id);
    });
});

function getProduct(id){
    $.ajax({
        url: 'get_product/'+id,
        type: 'GET',
        success:function(response){
            if (response.success) {
                $('#product_view').empty();
                str = '<div class="card shadow" id="user_selected_product">\
                            <img src="../images/'+response.product.picture+'" class="card-img-top d-block w-100">\
                            <div class="card-body">\
                                <h5 class="card-title">'+response.product.name+'</h5>\
                                <p class="card-text"></p>\
                                <div class="row" style="text-align: center">\
                                    <div class="col">\
                                        <p>Price : &nbsp;'+response.product.price+'</p>\
                                    </div>\
                                    <div class="col">\
                                        <p>Location : &nbsp;'+response.product.location+'</p>\
                                    </div>\
                                </div>\
                                <div class="row" style="text-align: center">\
                                    <div class="col">\
                                        <p>Quantity : &nbsp;'+response.product.quantity+'</p>\
                                    </div>\
                                    <div class="col">\
                                        <p>Sold : &nbsp;'+response.product.quantity_sold+'</p>\
                                    </div>\
                                </div>\
                                <div class="row" style="text-align: center">\
                                    <div class="col">\
                                        <p>Gender : &nbsp;'+response.product.gender+'</p>\
                                    </div>\
                                    <div class="col">\
                                        <p>Size : &nbsp;'+response.product.size+'</p>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';

                $('#product_view').append(str);
            }
        }
    });
}
</script>
@endsection