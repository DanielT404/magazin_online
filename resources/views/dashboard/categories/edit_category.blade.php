@extends('layouts.app')
@section('content')
    <div class="container">
        @if (isset($success) and $success)
            <div class="alert alert-success">
                <ul>
                    Categoria a fost modificata cu succes!
                </ul>
            </div>
            <a href="{{route('categories')}}" class="btn btn-info">Mergi inapoi</a>
        @else
            <form action="{{route('category.edit.submit',['id' => request()->route('id')])}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nume</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="@if(isset($category->name)) {{$category->name}} @else {{old('name')}}@endif" autofocus>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

        </form>
            @endif
    </div>
@endsection