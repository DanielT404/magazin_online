@extends('layouts.app')
@section('stylesheets')
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="slider-wrapper">
                    <div class="col-md-8">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                @if(count($sliderImages) > 0)
                                <div class="carousel-inner" role="listbox">
                                    @foreach($sliderImages as $i => $sliderImg)
                                        @if($i == 0)
                                        <div class="item active">
                                            <img src="/storage/{{$sliderImg->image_path}}" alt="imagine" width="100%">
                                        </div>
                                        @else
                                            <div class="item">
                                                <img src="/storage/{{$sliderImg->image_path}}" width="100%">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                        <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                @endif
                            </div>
                    </div>
                    <div class="col-md-4">
                        @if(count($sideSliderImages) > 0)
                            @foreach($sideSliderImages as $sideImg)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="right-slider-item">
                                    <img src="/storage/{{$sideImg->path_image}}" alt="" width="100%">
                                    <div id="right-slider-item-anim"></div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured-products">
        <div class="container">
            <div class="title">
                <h2 class="text-center">Produse recomandate</h2>
            </div>
            <div class="section-body">
                @if(count($products) > 0)
                    @foreach($products as $featured)
                        <div class="col-md-3">
                            <div class="section-body-img">
                                <a href="/produse/{{$featured->slug}}">
                                    <img src="/storage/{{$featured->image}}" width="100%"/>
                                </a>
                                <div class="product-details">
                                    <div class="product-details">
                                        <p class="product-title">{{$featured->name}}</p>
                                        <h4 class="product-price">{{$featured->price}} {{$featured->currency}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <h2 class="text-center">Oops! Momentan nu sunt disponibile produse recomandate. Revino mai tarziu!</h2>
                @endif
                </div>
            </div>
        </div>
    </section>
    <section id="categories">
        <div class="container">
            <div class="title">
                <h2 class="text-center">Ale noastre categorii...</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                    <div class="col-md-2">
                        <div class="section-body-img">
                            <img src="/storage/{{$category->image_path}}" width="100%"/>
                            <div class="product-details">
                                <div class="product-details">
                                    <p class="product-title">{{$category->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <h2 class="text-center">Oops! Momentan nu sunt adaugate categoriile. Revino mai tarziu!</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="latest-bestsellers">
        <div class="container">
            <div class="title-custom">
                <h2 class="text-center"><a href="#0" class="active-choose">Adaugate recent</a> <span class="title-bar"></span> <a href="#0">Cele mai vandute produse</a></h2>
            </div>
            <div class="section-body">
                    @if(count($recentProducts) > 0)
                        @foreach($recentProducts as $product)
                    <div class="col-md-3">
                        <div class="section-body-img">
                            <a href="/produse/{{$product->slug}}">
                                <img src="/storage/{{$product->image}}"/>
                            </a>
                            <div class="product-details">
                                <div class="product-details">
                                    <p class="product-title">{{$product->name}}</p>
                                    <h4 class="product-price">{{$product->price}} {{$product->currency}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <h2 class="text-center">Momentan nu este adaugat nici un produs. Te rugam sa revii mai tarziu!</h2>
                    @endif
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<div class="product-details">--}}
                                    {{--<p class="product-title">Lorem ipsum</p>--}}
                                    {{--<h4 class="product-price">300 lei</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<p class="product-title">Lorem ipsum</p>--}}
                                {{--<h4 class="product-price">300 lei</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<div class="product-details">--}}
                                    {{--<p class="product-title">Lorem ipsum</p>--}}
                                    {{--<h4 class="product-price">300 lei</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<div class="product-details">--}}
                                    {{--<p class="product-title">Lorem ipsum</p>--}}
                                    {{--<h4 class="product-price">300 lei</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<div class="product-details">--}}
                                    {{--<p class="product-title">Lorem ipsum</p>--}}
                                    {{--<h4 class="product-price">300 lei</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<p class="product-title">Lorem ipsum</p>--}}
                                {{--<h4 class="product-price">300 lei</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="section-body-img">--}}
                            {{--<img src="https://placehold.it/400x500"/>--}}
                            {{--<div class="product-details">--}}
                                {{--<div class="product-details">--}}
                                    {{--<p class="product-title">Lorem ipsum</p>--}}
                                    {{--<h4 class="product-price">300 lei</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="container text-center">
                <a class="btn btn-info">Vezi catalogul nostru de produse</a>
            </div>
        </div>
    </section>
    <section id="brands">
        <div class="container">
            <div class="title">
                <h2 class="text-center">Brand-uri prezente</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                    <div class="col-md-2 brand-img">
                        <img src="https://placehold.it/150x100" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection