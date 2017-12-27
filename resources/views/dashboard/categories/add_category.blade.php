@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('name') as $message)
                        Introdu numele categoriei.
                    @endforeach
                </ul>
            </div>
        @endif
        @if (isset($success))
            <div class="alert alert-success">
                <ul>
                    Categoria a fost adaugata cu succes!
                </ul>
            </div>
            @endif
        <form action="{{route('category.add.submit')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nume</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Introdu numele categoriei..." autofocus>
                </div>
            </div>
            <button class="btn btn-success" type="submit" style="display: block; margin: 0 auto;">Trimite</button>

        </form>
    </div>
@endsection