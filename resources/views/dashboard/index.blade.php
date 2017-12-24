@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {{--@foreach ($subcategories as $subcategory)--}}
                            {{--{{ $subcategory->name }}--}}
                        {{--@endforeach--}}

                        <pre>{{$subcategories['color']}}</pre>
                        <pre>{{$subcategories['length']}}</pre>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection