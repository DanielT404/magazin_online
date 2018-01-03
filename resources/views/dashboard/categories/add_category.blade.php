@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('name') as $message)
                        <li>Introdu numele categoriei.</li>
                    @endforeach

                        @foreach ($errors->get('image') as $message)
                            <li>Uploadeaza o imagine.</li>
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
        <form action="{{route('category.add.submit')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nume</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Introdu numele categoriei..." autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Imagine reprezentativa</label>
                <div class="col-md-6">
                    <input id="name" type="file" class="form-control" name="image">
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

        </form>
    </div>
@endsection