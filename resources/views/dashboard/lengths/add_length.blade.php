@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Adauga marime</h2>
        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->get('name') as $message)--}}
                        {{--Introdu numele categoriei.--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}
        @if (isset($success))
            <div class="alert alert-success">
                <ul>
                   Marimea a fost adaugata cu succes!
                </ul>
            </div>
            <a href="{{route('lengths')}}" class="btn btn-info">Mergi inapoi</a>
        @else
            <form action="{{route('length.add.submit')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Marime</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="length" placeholder="Introdu marimea..." autofocus>
                    </div>
                </div>
                <button class="btn btn-success" type="submit" name="submitted" style="display: block; margin: 0 auto;">Trimite</button>

            </form>
        @endif
    </div>
@endsection