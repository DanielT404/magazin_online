@extends('layouts.app')
@section('stylesheets')
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="container">
    @foreach($product as $prod)
        <ul class="breadcrumb">
            <li><a href="#">Acasa</a></li>
            <li><a href="#">{{$prod->getCategory->name}}</a></li>
            <li class="active">{{$prod->name}}</li>
        </ul>
    @endforeach
    </div>

    <div class="container" style="margin-top: 65px; margin-bottom: 65px;">
        <div class="main-area">
            @foreach($product as $prod)
                <div class="row">
                    <div class="col-md-6">
                        <img id="prod-img" src="/storage/{{$prod->image}}" width="100%"/>
                    </div>
                    <div class="col-md-6">
                        <h2 class="product-title">{{$prod->name}}</h2>

                        <div class="col-md-6" style="margin: 0 !important; padding: 0 !important;">
                                <ul style="margin-top: 25px; padding: 0 !important;">
                                    <li>
                                        <div class="row" style="display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                                            <div class="col-md-6">
                                                Cantitate
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group" style="width: 200px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                              <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                                    <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-md-6">
                                                Pret
                                            </div>
                                            <div class="col-md-6">
                                                {{$prod->price}} {{$prod->currency}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-info">Adauga in cosul de cumparaturi</button>
                                            </div>
                                        </div>
                                    </li>
                                    @if($prod->color_option == 'Yes')
                                    <li>
                                        Culoare
                                    </li>
                                    @endif
                                    @if($prod->length_option == 'Yes')
                                    <li>
                                        Marime
                                    </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-md-4" style="margin-left: 16%;">
                                <ul style="border-left: 1px solid #cccccc;">
                                    <li>
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <span class="title-prod-right">Livrare gratuita</span>
                                        <p class="p-desc-prod">pentru toate produsele</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <span class="title-prod-right">Cadouri speciale</span>
                                        <p class="p-desc-prod">pentru clienti fideli</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                        <span class="title-prod-right">Returnare gratuita</span>
                                        <p class="p-desc-prod">in primele 30 de zile</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <span class="title-prod-right">Aflat in trending</span>
                                        <p class="p-desc-prod">in anul 2018</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12" style="margin-top: 65px;">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <h4 class="panel-title">
                                            <button class="btn btn-info btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Masuri si specificatii</button>
                                        </h4>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <h4 class="panel-title">
                                            <button class="btn btn-info btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Optiuni de livrare si politica de returnare</button>
                                        </h4>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <h4 class="panel-title">
                                            <button class="btn btn-info btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Tabel marimi</button>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="container">

                        <div class="content-sec">
                            <h2 class="title-extended-prod">Descriere</h2>
                            <p>{{$prod->description}}</p>

                            <h2 class="title-extended-prod">Contactati-ne</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante.</p>

                            <h2 class="title-extended-prod">Livrare</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante. Fusce nec tristique enimdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>

                            <h2 class="title-extended-prod">Metode de plata</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante. Fusce nec tristique enimdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante. Fusce nec tristique enimdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>

                            <h2 class="title-extended-prod">FAQ</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante. Fusce nec tristique enimdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam perspiciatis unde omnis iste natus error sit voluptatem accusantium enim ut fringilla. Quisque eu lacus enim. Proin eleifend, mi eu aliquam euismod, arcu tortor consectetur nisi, et elementum nibh felis vel ante. Fusce nec tristique enimdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('javascripts')
    <script src="{{asset('js/main.js')}}"></script>
@endsection