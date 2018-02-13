@extends('layouts.app')
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
                                            <img src="storage/{{$sliderImg->image_path}}" alt="imagine" width="100%">
                                        </div>
                                        @else
                                            <div class="item">
                                                <img src="storage/{{$sliderImg->image_path}}" width="100%">
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
                                    <a href="#0">
                                        <img src="storage/{{$sideImg->path_image}}" alt="" width="100%">
                                      <!--  <div id="right-slider-item-anim"></div>-->
                                    </a>
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
                <h2 class="text-center"><span>Cele mai populare</span></h2>
            </div>
            <div class="section-body">
                @if(count($products) > 0)
                    @foreach($products as $featured)
                        <div class="col-md-3">
                            <div class="section-body-img">
                                <a href="produse/{{$featured->slug}}">
                                    <img src="storage/{{$featured->image}}" width="100%"/>
                                </a>
                                <div class="section-body-img-anim"></div>
                                <div class="section-body-img-anim-body">

                                    <button class="btn-product">Vezi produsul</button>
                                    <a class="btn-product" href="produse/{{$featured->slug}}" style="margin-right: 1px;">Optiuni</a>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="product-details">
                                    <p class="product-title">{{$featured->name}}</p>
                                    <h4 class="product-price">{{$featured->price}} {{$featured->currency}}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <h2 class="text-center"><span>Oops! Momentan nu sunt disponibile produse recomandate. Revino mai tarziu!</span></h2>
                @endif
                </div>
            </div>
        </div>
    </section>
    <section id="categories">
        <div class="container">
            <div class="title">
                <h2 class="text-center"><span>Colectia noastra</span></h2>
            </div>
            <div class="section-body">
                <div class="eq-middle">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                    <div class="">
                        <div class="section-body-img category-body-img">
                            <img src="storage/{{$category->image_path}}" width="100%" height="240px"/>
                            <div class="category-body-img-anim"></div>
                        </div>
                        <div class="product-details">
                            <div class="product-details">
                                <p class="product-title">{{$category->name}}</p>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <h2 class="text-center"><span>Oops! Momentan nu sunt adaugate categoriile. Revino mai tarziu!</span></h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="latest-bestsellers">
        <div class="container">
            <div class="title">
                <h2 class="text-center choose"><span><a href="#0" class="active-choose">Recente</a> <span class="title-bar"></span> <a href="#0">Best sellers</a></span></h2>
            </div>
            <div class="section-body">
                    @if(count($recentProducts) > 0)
                        @foreach($recentProducts as $product)
                    <div class="col-md-3">
                        <div class="section-body-img">
                            <a href="produse/{{$product->slug}}">
                                <img src="storage/{{$product->image}}" width="100%"/>
                            </a>
                            <div class="section-body-img-anim"></div>
                            <div class="section-body-img-anim-body">
                                <a class="btn-product" style="margin-right: 1px;" href="produse/{{$product->slug}}">Vezi produsul</a>
                                <button class="btn-product">Optiuni</button>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details">
                                <p class="product-title">{{$product->name}}</p>
                                <h4 class="product-price">{{$product->price}} {{$product->currency}}</h4>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <h2 class="text-center">Momentan nu este adaugat nici un produs. Te rugam sa revii mai tarziu!</h2>
                    @endif
                </div>
            </div>

            <div class="container text-center see-all-products">
                <a href="produse" class="btn btn-info"><span>Vezi toate produsele <i class="fa fa-long-arrow-right"></i></span></a>
            </div>
        </div>
    </section>
    <div class="block-bht">
        <div class="paralax-bg"></div>
    </div>
    <section id="brands">
        <div class="container">
            <div class="title">
                <h2 class="text-center"><span>Brand-uri</span></h2>
            </div>
            <div class="section-body">
                    @foreach($brandImages as $img)
                    <div class="col-md-2 brand-img">
                        <img src="storage/{{$img->image_path}}" width="100%" alt="">
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection