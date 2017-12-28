@extends('layouts.app')
@section('content')
    <div class="container">
        @if (isset($success) and $success)
            <div class="alert alert-success">
                <ul>
                    Produsul a fost modificat cu succes!
                </ul>
            </div>
            <a href="{{route('products')}}" class="btn btn-info">Mergi inapoi</a>
        @else
            <form action="{{route('product.edit.submit',['id' => request()->route('id')])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nume</label>
                    <input id="name" type="text" class="form-control" name="name" value="@if(isset($product->name)) {{$product->name}} @else {{old('name')}}@endif" autofocus>
                </div>

                <div class="form-group">
                    <label for="description">Descriere</label>
                    <textarea class="form-control" rows="5" name="description" value="@if(isset($product->description)) {{$product->description}} @else {{old('description')}}@endif">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Categorie</label>
                    <select class="form-control" id="category" name="category_id">
                        @if(isset($product) && count($product) > 0)
                            @foreach($categories as $category)
                                @if($product->getCategory->name == $category->name)
                                  <option value="{{$product->getCategory->id}}" selected="selected">{{$product->getCategory->name}}</option>
                                @elseif($product->getCategory->name !== $category->name)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="null" disabled>Nu sunt categorii adaugate in baza de date.</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Imagine</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Selecteaza imaginea...">
                </div>

                <div class="form-group">
                    <label for="price">Pret</label>
                    <input type="text" class="form-control" name="price" value="@if(isset($product->price)) {{$product->price}} @else {{old('price')}}@endif" required>
                </div>

                <div class="form-group">
                    <label for="currency">Moneda</label>
                    <label class="radio-inline">
                        @if(isset($product->currency) && $product->currency == 'lei')<input type="radio" name="currencyradio" value="lei" checked>lei
                            @else <input type="radio" name="currencyradio" value="lei">lei
                        @endif
                    </label>
                    <label class="radio-inline">
                        @if(isset($product->currency) && $product->currency == '€')<input type="radio" name="currencyradio" value="€" checked>&euro;
                            @else <input type="radio" name="currencyradio" value="€">&euro;
                        @endif
                    </label>
                    <label class="radio-inline">
                        @if(isset($product->currency) && $product->currency == '$')<input type="radio" name="currencyradio" value="$" checked>$
                            @else <input type="radio" name="currencyradio" value="$">$
                        @endif
                    </label>
                </div>

                <div class="form-group">
                    <label for="colorOption">Optiune culoare</label>
                    <label class="radio-inline">
                        @if(isset($product->color_option) && $product->color_option == 'Yes')
                            <input type="radio" name="colorOptionradio" value="Yes" onclick="document.getElementById('colors').style.display = 'block'" checked autofocus>Da
                            @else <input type="radio" name="colorOptionradio" value="Yes" onclick="document.getElementById('colors').style.display = 'block'">Da
                        @endif

                    </label>
                    <label class="radio-inline">
                        @if(isset($product->color_option) && $product->color_option == 'No')
                            <input type="radio" name="colorOptionradio" value="No" onclick="document.getElementById('colors').style.display = 'none'" checked autofocus>Nu
                            @else <input type="radio" name="colorOptionradio" value="No" onclick="document.getElementById('colors').style.display = 'none'">Nu
                        @endif
                    </label>
                </div>

                @if(isset($product->color_option) && $product->color_option == 'Yes')
                <div class="form-group" id="colors">
                    <label for="color">Culoare:</label>
                    <select class="form-control" id="color" name="color_id">
                        @if(isset($colors) && count($colors) > 0)
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color}}</option>
                            @endforeach
                        @else
                            <option value="null" disabled>Nu sunt culori adaugate in baza de date.</option>
                        @endif
                    </select>
                </div>
                    @else
                    <div class="form-group" id="colors" style="display: none;">
                        <label for="color">Culoare:</label>
                        <select class="form-control" id="color" name="color_id">
                            @if(isset($colors) && count($colors) > 0)
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color}}</option>
                                @endforeach
                            @else
                                <option value="null" disabled>Nu sunt culori adaugate in baza de date.</option>
                            @endif
                        </select>
                    </div>

                @endif

                <div class="form-group">
                    <label for="lengthOption">Optiune marimi</label>
                    <label class="radio-inline">
                        @if(isset($product->length_option) && $product->length_option == 'Yes')
                            <input type="radio" name="lengthOptionradio" value="Yes" onclick="document.getElementById('lengths').style.display = 'block'" checked autofocus>Da
                        @else
                            <input type="radio" name="lengthOptionradio" value="Yes" onclick="document.getElementById('lengths').style.display = 'block'">Da
                        @endif
                    </label>
                    <label class="radio-inline">
                        @if(isset($product->length_option) && $product->length_option == 'No')
                            <input type="radio" name="lengthOptionradio" value="No" onclick="document.getElementById('lengths').style.display = 'none'" checked autofocus>Nu
                        @else
                            <input type="radio" name="lengthOptionradio" value="No" onclick="document.getElementById('lengths').style.display = 'none'">Nu
                        @endif
                    </label>
                </div>


                @if(isset($product->length_option) && $product->length_option == 'Yes')
                <div class="form-group" id="lengths">
                    <label for="color">Marime:</label>
                    <select class="form-control" id="color" name="length_id">
                        @if(isset($lengths) && count($lengths) > 0)
                            @foreach($lengths as $length)
                                <option value="{{$length->id}}">{{$length->length}}</option>
                            @endforeach
                        @else
                            <option value="null" disabled>Nu sunt marimi adaugate in baza de date.</option>
                        @endif
                    </select>
                </div>
                    @else
                    <div class="form-group" id="lengths" style="display: none;">
                        <label for="color">Marime:</label>
                        <select class="form-control" id="color" name="length_id">
                            @if(isset($lengths) && count($lengths) > 0)
                                @foreach($lengths as $length)
                                    <option value="{{$length->id}}">{{$length->length}}</option>
                                @endforeach
                            @else
                                <option value="null" disabled>Nu sunt marimi adaugate in baza de date.</option>
                            @endif
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <label for="stock">Stoc</label>
                    <input type="text" class="form-control" name="stock" value="@if(isset($product->stock)) {{$product->stock}} @else {{old('stock')}}@endif">
                </div>

                <div class="form-group">
                    <label for="featured">Adauga la produse recomandate (featured)</label>
                    <label class="radio-inline">
                        @if(isset($product->featured) && $product->featured == 1)
                            <input type="radio" name="featuredradio" value="1" checked>Da
                            @else
                            <input type="radio" name="featuredradio" value="1">Da
                        @endif
                    </label>
                    <label class="radio-inline">
                        @if(isset($product->featured) && $product->featured == 0)
                            <input type="radio" name="featuredradio" value="0" checked>Nu
                            @else
                            <input type="radio" name="featuredradio" value="0">Nu
                        @endif
                    </label>
                </div>


                <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

            </form>
        @endif
    </div>
@endsection