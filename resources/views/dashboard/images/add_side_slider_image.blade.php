@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('image') as $message)
                        Uploadeaza o imagine.
                    @endforeach
                </ul>
            </div>
        @endif
        @if (isset($success))
            <div class="alert alert-success">
                <ul>
                    Imaginea a fost adaugata cu succes!
                </ul>
            </div>

            <a class="btn btn-info" href="{{route('dashboard.index')}}">Mergi inapoi</a> sau
            <a class="btn btn-info" href="{{route('home')}}">Viziteaza pagina principala</a>
        @else
            <form action="{{route('side_slider_image.add.submit')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Imagine</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="active" class="col-md-4 control-label">Imagine activa (apare in dreapta slide-ului)?</label>
                    <label class="radio-inline">
                        <input type="radio" name="activeradio" value="1" checked>Da
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="activeradio" value="0">Nu
                    </label>
                </div>
                <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

            </form>
        @endif
    </div>
@endsection