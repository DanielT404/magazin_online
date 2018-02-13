@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                Operatiune realizata cu succes!
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Imagine (link URL)
                </th>
                <th>
                    Status
                </th>
                <th>
                    Actiune
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <td>
                            <a href="/storage/{{$image->image_path}}">Click</a>
                        </td>
                        <td>
                            {{$image->active ? 'Activa': 'Inactiva'}}
                        </td>
                        <td>
                            @if($image->active)
                                <a class="btn btn-danger" href="{{route('slider_image.edit.show', ['id' => $image->id, 'status' => $image->active])}}" onclick="document.getElementById('edit-form').submit();">Modifica status in inactiva</a>
                                @else
                                <a class="btn btn-success" href="{{route('slider_image.edit.show', ['id' => $image->id, 'status' => $image->active])}}" onclick="document.getElementById('edit-form').submit();">Modifica status in activa</a>
                            @endif
                        </td>
                        <form method="POST" action="{{route('slider_image.edit.submit', ['id' => $image->id, 'status' => $image->active])}}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-primary" style="display: none;">
                                Submit
                            </button>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection