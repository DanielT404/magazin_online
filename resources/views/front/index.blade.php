@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Catalog produse</h2>
        @foreach($products as $featuredProducts)
            <div class="col-md-4">
                Nume:
                {{ $featuredProducts->name }}
                <br>
                Descriere:
                <br>
                {{ $featuredProducts->description }}
                <img src="{{ $featuredProducts->image }}" alt=""/>
            </div>
        @endforeach
    </div>
@endsection