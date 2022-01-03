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
<div class="row">
    <div class="row" id="homepage_heading">
        <h1>Popular Products</h1>
    </div>
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="margin-block: 5%;">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<div class="row" id="for_you_div">
    <div class="row" id="homepage_heading2">
        <h1>For You</h1>
    </div>
    <div class="row" id="for_you_content">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/jumbo1.jpg') }}" class="card-img-top d-block w-100" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection