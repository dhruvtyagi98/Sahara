@extends('layouts.app')
@section('title', 'Sahara | Home')
@section('main-content')
<div class="row">
    <div class="col-5" id="homepage_main_font">
        <div class="row">
            <h3 id="homepage_header_1">Winter Collection</h3>
        </div>
        <div class="row">
            <h1 id="homepage_header_2">Just Get It.</h1>
        </div>
        <div class="row">
            <p style="margin-block: 20px; font-size:20px; font-family: 'Nunito Sans', sans-serif;">The Winter Collection is here.<br> Get upto 50% OFF on your Favourite Brands.</p>
        </div>
    </div>
    <div class="col">
        <img class="shadow-lg" id="homepage_main_img" src="{{ asset('images/homepage.jpg') }}" alt="">
    </div>
</div>

{{-- Popular Products --}}
<div class="row" id="popular_products_div">
    <div class="row" id="homepage_heading">
        <h1>Popular Products</h1>
    </div>
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="margin-block: 2%;">
                <div id="popular_product_content"></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

{{-- For the User On the basis of last purchase --}}
@if (Auth::user())
    <div class="row" id="for_you_div">
        <div class="row" id="homepage_heading2">
            <h1>For You</h1>
        </div>
        <div class="row" id="for_you_content">
        </div>
    </div>
@endif

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        getPopularProducts();
        getSimilarProducts();
    });

    function getPopularProducts() {
        $.ajax({
            url: '/popular_products',
            type: 'GET',
            success:function (response) {
                if (response.success) {
                    var str = '';
                    stringlength = 50;
                    if($( window ).width()<1363)
                        var stringlength = 25;

                    for (let i = 0; i < response.data.length; i++) {
                        const product = response.data;
                        
                        str += '<div class="carousel-item">\
                                    <div class="row">\
                                        <div class="col-3">\
                                            <div class="card shadow mb-3" style="width: 18rem;">\
                                                <img src="images/'+product[i].picture+'" class="card-img-top d-block w-100" alt="...">\
                                                <a href="product/'+product[i].id+'">\
                                                    <div class="card-body">\
                                                        <h5 class="card-title">'+product[i].name+'</h5>';

                        description = reduceDescription(product[i++].description,stringlength);
   
                            str +=                    '<p class="card-text">'+description+'</p>\
                                                    </div>\
                                                </a>\
                                            </div>\
                                        </div>\
                                        <div class="col-3">\
                                            <div class="card shadow mb-3" style="width: 18rem;">\
                                                <img src="images/'+product[i].picture+'" class="card-img-top d-block w-100" alt="...">\
                                                <a href="product/'+product[i].id+'">\
                                                    <div class="card-body">\
                                                        <h5 class="card-title">'+product[i].name+'</h5>';

                        description = reduceDescription(product[i++].description,stringlength);
                        
                            str +=                    '<p class="card-text">'+description+'</p>\
                                                    </div>\
                                                </a>\
                                            </div>\
                                        </div>\
                                        <div class="col-3">\
                                            <div class="card shadow mb-3" style="width: 18rem;">\
                                                <img src="images/'+product[i].picture+'" class="card-img-top d-block w-100" alt="...">\
                                                <a href="product/'+product[i].id+'">\
                                                    <div class="card-body">\
                                                        <h5 class="card-title">'+product[i].name+'</h5>';

                        description = reduceDescription(product[i].description,stringlength);
                        
                            str +=                     '<p class="card-text">'+description+'</p>\
                                                    </div>\
                                                </a>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>';
                    }
                    $('#popular_product_content').append(str);
                    $('.carousel-item').first().addClass('active');
                    $('.carousel-indicators > li').first().addClass('active');
                    $('#carousel').carousel();
                }

                else
                    $('popular_products_div').hide();
            }
        });
    }

    function reduceDescription(description, stringlength) {
        if (description.length > stringlength){
            description = description.substr(0,stringlength)+'.....more';
            return description;
        }
        return description;
    }

    function getSimilarProducts() {
        
        $.ajax({
            url: '/similar_products',
            type: 'GET',
            success:function (response) {
                if (response.success) {
                    var str = '';
                    stringlength = 50;
                    if($( window ).width()<1363)
                        var stringlength = 25;
                    
                    $.each(response.data,function(k,v) {
                        var description = reduceDescription(v.description,stringlength);;
                        str += '<div class="col">\
                                    <div class="card" style="width: 18rem;">\
                                        <img src="images/'+v.picture+'" class="card-img-top d-block w-100" alt="...">\
                                        <div class="card-body">\
                                            <h5 class="card-title">'+v.name+'</h5>\
                                            <p class="card-text">'+description+'</p>\
                                        </div>\
                                    </div>\
                                </div>';
                    });
                    $('#for_you_content').append(str);
                }
                else
                    $('#for_you_content').hide();
            }
        });
    }
</script>
@endsection