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
                            <li>Introdu link-ul catre imaginea produsului (ex. imgur)</li>
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
        <form action="{{route('product.add.submit')}}" method="POST" class="form-horizontal">
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
                <input type="text" class="form-control" name="image" placeholder="Introdu URL catre imaginea produsului... value={{old('image')}}">
            </div>
            <div class="form-group">
                <label for="currency">Moneda</label>
                <label class="radio-inline">
                    <input type="radio" name="currencyradio" value="lei">lei
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
                    <input type="radio" name="colorOptionradio" value="Yes">Da
                </label>
                <label class="radio-inline">
                    <input type="radio" name="colorOptionradio" value="No">Nu
                </label>
            </div>
            <div class="form-group">
                <label for="lengthOption">Optiune marimi</label>
                <label class="radio-inline">
                    <input type="radio" name="lengthOptionradio" value="Yes">Da
                </label>
                <label class="radio-inline">
                    <input type="radio" name="lengthOptionradio" value="No">Nu
                </label>
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