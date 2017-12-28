@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('name') as $message)
                        <li>Introdu numele produsului.</li>
                    @endforeach
                    @foreach ($errors->get('description') as $message)
                            <li>Adauga o scurta descriere produsului (minim 5 caractere)</li>
                        @endforeach
                        @foreach ($errors->get('image') as $message)
                            <li>Incarca o imagine</li>
                        @endforeach
                        @foreach ($errors->get('currencyradio') as $message)
                            <li>Alege o optiune pentru moneda (lei, €, $).</li>
                        @endforeach
                        @foreach ($errors->get('price') as $message)
                            <li>Introdu pretul produsului.</li>
                        @endforeach
                        @foreach ($errors->get('colorOptionradio') as $message)
                            <li>Alege o optiune pentru culoare (Da / Nu).</li>
                        @endforeach
                        @foreach ($errors->get('lengthOptionradio') as $message)
                            <li>Alege o optiune pentru marime (Da / Nu).</li>
                        @endforeach
                        @foreach ($errors->get('featuredradio') as $message)
                            <li>Alege o optiune pentru produs recomandat (Da / Nu).</li>
                        @endforeach
                </ul>
            </div>
        @endif
        @if (isset($added) && $added)
            <div class="alert alert-success">
                <ul>
                    Produsul a fost adaugat cu succes!
                </ul>
            </div>
        @endif
            <h2 class="text-center">Adauga un nou produs</h2>
        <form action="{{route('product.add.submit')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nume</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="Introdu numele produsului..." value="{{old('name')}}" autofocus>
            </div>
            <div class="form-group">
                <label for="comment">Descriere</label>
                <textarea class="form-control" rows="5" name="description" placeholder="Adauga o scurta descriere..." value="{{old('description')}}"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagine</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Selecteaza imaginea...">
            </div>
            <div class="form-group">
                <label for="category">Categorie</label>
                <select class="form-control" id="category" name="category_id">
                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        @else
                            <option value="" disabled>Nu sunt adaugate categorii in baza de date.</option>
                    @endif
                </select>
            </div>
            {{--<div class="form-group">--}}
                {{--<label for="category">Subcategorie</label>--}}
                {{--<select class="form-control" id="category" name="subcategory_id">--}}
                    {{--@if(isset($categories) && count($categories) > 0)--}}
                        {{--@foreach($categories as $category)--}}
                            {{--@foreach($category->subcategories as $subcategory)--}}
                                {{--<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--<option value="" disabled>Nu sunt adaugate categorii in baza de date.</option>--}}
                    {{--@endif--}}
                {{--</select>--}}
            {{--</div>--}}
            <div class="form-group">
                <label for="currency">Moneda</label>
                <label class="radio-inline">
                    <input type="radio" name="currencyradio" value="lei" checked>lei
                </label>
                <label class="radio-inline">
                    <input type="radio" name="currencyradio" value="€">&euro;
                </label>
                <label class="radio-inline">
                    <input type="radio" name="currencyradio" value="$">$
                </label>
            </div>
            <div class="form-group">
                <label for="price">Pret</label>
                <input type="number" class="form-control" name="price" placeholder="Introdu pretul (moneda aleasa mai sus)" value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label for="colorOption">Optiune culoare</label>
                <label class="radio-inline">
                    <input type="radio" name="colorOptionradio" value="Yes" onclick="document.getElementById('colors').style.display = 'block'">Da
                </label>
                <label class="radio-inline">
                    <input type="radio" name="colorOptionradio" value="No" onclick="document.getElementById('colors').style.display = 'none'">Nu
                </label>
            </div>
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
            <div class="form-group">
                <label for="lengthOption">Optiune marimi</label>
                <label class="radio-inline">
                    <input type="radio" name="lengthOptionradio" value="Yes" onclick="document.getElementById('lengths').style.display = 'block'">Da
                </label>
                <label class="radio-inline">
                    <input type="radio" name="lengthOptionradio" value="No" onclick="document.getElementById('lengths').style.display = 'none'">Nu
                </label>
            </div>
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
            <div class="form-group">
                <label for="stock">Stoc</label>
                <input type="number" class="form-control" name="stock" placeholder="Introdu nr. de bucati din stoc..." value="{{old('stock')}}" min="1" max="5000">
            </div>
            <div class="form-group">
                <label for="featured">Adauga la produse recomandate (featured)</label>
                <label class="radio-inline">
                    <input type="radio" name="featuredradio" value="1">Da
                </label>
                <label class="radio-inline">
                    <input type="radio" name="featuredradio" value="0">Nu
                </label>
            </div>

            <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

        </form>
    </div>
@endsection