@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if (isset($added) and $added)
            <div class="alert alert-success">
                <ul>
                    Subcategoria a fost adaugata cu succes.
                </ul>
            </div>
            <a class="btn btn-info" href="{{route('categories')}}">Mergi inapoi</a>
        @else
            <h3 class="text-center">Adauga subcategorie categoriei {{$category->name}}</h3>
            <form action="{{route('category.add.subcategory.submit',['id' => request()->route('id')])}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nume</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="" autofocus>
                    </div>
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}"/>
                <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>
            </form>
        @endif
    </div>
@endsection